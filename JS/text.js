// Booking.js - Complete with Google Maps
let map;
let directionsService;
let directionsRenderer;
let pickupAutocomplete;
let dropAutocomplete;
let distance = 0;
let duration = 0;
let fare = 0;

// Initialize Google Maps
function initMap() {
    // Default center to Kwara State
    const kwaraCenter = { lat: 8.9667, lng: 4.5667 };
    
    // Initialize map
    map = new google.maps.Map(document.getElementById("map"), {
        center: kwaraCenter,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [
            {
                featureType: "poi",
                elementType: "labels",
                stylers: [{ visibility: "off" }]
            }
        ]
    });

    // Initialize services
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: false,
        polylineOptions: {
            strokeColor: "#3498db",
            strokeWeight: 5,
            strokeOpacity: 0.8
        }
    });

    // Initialize autocomplete
    initAutocomplete();
    
    // Initialize event listeners
    initEventListeners();
}

// Initialize Google Places Autocomplete
function initAutocomplete() {
    const options = {
        componentRestrictions: { country: "ng" },
        types: ['establishment', 'geocode']
    };

    // Pickup location autocomplete
    const pickupInput = document.getElementById("pickupLocation");
    pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, options);
    
    // Drop location autocomplete
    const dropInput = document.getElementById("dropLocation");
    dropAutocomplete = new google.maps.places.Autocomplete(dropInput, options);

    // Add listeners for place changes
    pickupAutocomplete.addListener('place_changed', function() {
        calculateRoute();
    });

    dropAutocomplete.addListener('place_changed', function() {
        calculateRoute();
    });
}

// Initialize event listeners
function initEventListeners() {
    // Show/hide map button
    const showMapBtn = document.getElementById("showMapBtn");
    const mapContainer = document.getElementById("mapContainer");
    
    showMapBtn.addEventListener("click", function() {
        mapContainer.style.display = mapContainer.style.display === "none" ? "block" : "none";
        if (mapContainer.style.display === "block") {
            calculateRoute();
        }
    });

    // Vehicle type change listener
    const vehicleTypeSelect = document.getElementById("vehicleType");
    vehicleTypeSelect.addEventListener("change", calculateFare);

    // Service type change listener
    const serviceSelect = document.getElementById("serviceSelect");
    serviceSelect.addEventListener("change", calculateFare);
}

// Calculate route between pickup and drop locations
function calculateRoute() {
    const pickup = document.getElementById("pickupLocation").value;
    const drop = document.getElementById("dropLocation").value;

    if (!pickup || !drop) {
        return;
    }

    const request = {
        origin: pickup,
        destination: drop,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    };

    directionsService.route(request, function(result, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);
            
            // Get distance and duration
            const route = result.routes[0].legs[0];
            distance = route.distance.value / 1000; // Convert to km
            duration = Math.ceil(route.duration.value / 60); // Convert to minutes
            
            updateDistanceInfo();
            calculateFare();
            
            // Center map on the route
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(route.start_location);
            bounds.extend(route.end_location);
            map.fitBounds(bounds);
        } else {
            console.error("Directions request failed:", status);
            alert("Could not calculate route. Please check the locations.");
        }
    });
}

// Update distance information display
function updateDistanceInfo() {
    document.getElementById("distance").textContent = distance.toFixed(1) + " km";
    document.getElementById("duration").textContent = duration + " mins";
}

// Calculate fare based on distance and vehicle type
function calculateFare() {
    const vehicleTypeSelect = document.getElementById("vehicleType");
    const selectedOption = vehicleTypeSelect.options[vehicleTypeSelect.selectedIndex];
    const serviceSelect = document.getElementById("serviceSelect");
    const serviceType = serviceSelect.value;
    
    if (!selectedOption || !selectedOption.dataset.rate) {
        fare = 0;
        updateFareDisplay();
        return;
    }

    const rate = parseFloat(selectedOption.dataset.rate);
    let calculatedFare = distance * rate;
    
    // Apply multipliers for different service types
    if (serviceType === "roundtrip") {
        calculatedFare *= 1.8; // Round trip (not double, but less than 2x)
    } else if (serviceType === "airport") {
        calculatedFare += 1000; // Airport surcharge
    } else if (serviceType === "hourly") {
        const hours = Math.max(1, Math.ceil(duration / 60));
        calculatedFare = hours * (rate * 20); // Hourly rate (20km per hour estimate)
    }

    // Minimum fare
    fare = Math.max(1000, calculatedFare);
    
    updateFareDisplay();
}

// Update fare display
function updateFareDisplay() {
    document.getElementById("fare").textContent = "₦" + fare.toLocaleString();
}

// Initialize when page loads
document.addEventListener("DOMContentLoaded", function() {
    // Set up the date picker
    const dateInput = document.getElementById("inputDate");
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    dateInput.min = now.toISOString().slice(0, 16);
    dateInput.value = now.toISOString().slice(0, 16);
    
    // Set up other event listeners from previous code
    setupEventListeners();
});

// Initialize Google Maps when API is loaded
window.initMap = initMap;

// Updated sendBookingToServer function
async function sendBookingToServer(bookingId, paymentReference) {
    const bookingDataToSend = {
        ...bookingData,
        bookingId: bookingId,
        paymentReference: paymentReference,
        paymentMethod: bookingData.paymentMethod,
        status: bookingData.paymentMethod === "paystack" ? "paid" : "pending",
        timestamp: new Date().toISOString(),
    };

    try {
        const response = await fetch('/ridehub/api/save_booking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(bookingDataToSend)
        });

        const result = await response.json();
        
        if (response.ok) {
            console.log('Booking saved successfully:', result);
            
            // If Paystack payment, show payment button
            if (bookingData.paymentMethod === 'paystack') {
                initializePaystackPayment(result.total_amount, bookingId);
            }
        } else {
            console.error('Failed to save booking:', result);
            alert('Failed to save booking. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Network error. Please check your connection.');
    }
}

// Updated initializePaystackPayment function
function initializePaystackPayment(amount, bookingId) {
    const handler = PaystackPop.setup({
        key: 'pk_test_YOUR_PAYSTACK_PUBLIC_KEY', // Replace with actual key
        email: bookingData.email,
        amount: amount * 100, // Convert to kobo
        currency: 'NGN',
        ref: bookingId,
        callback: function(response) {
            console.log('Payment successful:', response);
            completeBooking(response.reference);
        },
        onClose: function() {
            alert('Payment was cancelled. Please try again.');
            processPaymentBtn.disabled = false;
            loadingSpinner.style.display = 'none';
        }
    });
    handler.openIframe();
}