import detailed_Properties from '../scripts/listings/properties.js';

// DOM Elements
const propertyContainer = document.getElementById("property-container");
const propertyType = document.getElementById("propertyType");
const statusFilter = document.getElementById("status");
const bedroomFilter = document.getElementById("bedroom");
const priceFilter = document.getElementById("priceFilter");
const searchButton = document.getElementById("searchButton");

// Set default filter values
propertyType.value = "villa";
statusFilter.value = "for-rent";
priceFilter.value = "greater";

// Function to create property HTML
function createPropertyCard(property) {
    const priceText = property.status === "for-rent" 
        ? `$${property.price.toLocaleString()}/month` 
        : `$${property.price.toLocaleString()}`;

    const features = [
        "Air Conditioning", "Refrigerator", "Dryer",
        "Laundry", "TV Cable", "Washer",
        "WiFi", "Window Covering", "Microwave"
    ];

    const featureButtons = features.map(feature => `<button class="feature-button">${feature}</button>`).join("");

    return `
        <div class="property-card">
            <div class="image-container">
                <button class="btn-property-type">${property.status.replace("-", " ")}</button>
                <img src="${property.images[0]}" alt="Property Image" class="property-image">
                <button class="arrow arrow-left">&#10094;</button>
                <button class="arrow arrow-right">&#10095;</button>
            </div>
            <div class="property-info">
                <p class="price">${priceText}</p>
                <p class="description">${property.description}</p>
                <div class="features">${featureButtons}</div>
            </div>
        </div>
    `;
}

// Function to update the property list based on filters
function updatePropertyList() {
    const filteredProperties = detailed_Properties.filter(p => 
        p.type === propertyType.value &&
        p.status === statusFilter.value && 
        (statusFilter.value === "for-rent" ? p.price > 1000 : true)
    );

    propertyContainer.innerHTML = filteredProperties.map(createPropertyCard).join("");
    addImageNavigationListeners();
}

// Function to handle image navigation
function addImageNavigationListeners() {
    document.querySelectorAll(".property-card").forEach(card => {
        const leftArrow = card.querySelector(".arrow-left");
        const rightArrow = card.querySelector(".arrow-right");
        const imgElement = card.querySelector(".property-image");
        const propertyId = parseInt(card.dataset.id);
        const property = detailed_Properties.find(p => p.id === propertyId);
        let currentIndex = 0;

        const updateImage = (index) => {
            imgElement.src = property.images[index];
        };

        leftArrow.addEventListener("click", (event) => {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + property.images.length) % property.images.length;
            updateImage(currentIndex);
        });

        rightArrow.addEventListener("click", (event) => {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % property.images.length;
            updateImage(currentIndex);
        });
    });
}

// Event Listener for Search Button
searchButton.addEventListener("click", updatePropertyList);

// Initial Load
updatePropertyList();