import properties from '../scripts/listings/properties.js';

// DOM Elements
const propertyList = document.getElementById("property-list");
const propertyType = document.getElementById("propertyType");
const statusFilter = document.getElementById("status");
const bedroomFilter = document.getElementById("bedroom");
const priceFilter = document.getElementById("price");
const priceLabel = document.getElementById("price-label");
const pageButtons = document.querySelectorAll(".page-btn");
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

let currentPage = 1;
const itemsPerPage = 9;

// Function to generate property HTML
function createPropertyCard(property) {
    const priceText = property.status === "for-rent" 
        ? `$${property.price.toLocaleString()}/month` 
        : `$${property.price.toLocaleString()}`;

    return `
        <a href="#" class="property-card" data-id="${property.id}">
            <div class="image-container">
                <button class="btn-property-type">${property.status.replace("-", " ")}</button>
                <img src="${property.images[0]}" alt="Property Image">
                <button class="arrow arrow-left">&#10094</button>
                <button class="arrow arrow-right">&#10095</button>
            </div>
            <div class="property-info">
                <p class="price">${priceText}</p>
                <p class="description">Beautiful ${property.bedroom} ${property.type} available ${property.status.replace("-", " ")}.</p>
                <p class="location">
                    <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                    <span>Somewhere in Addis Ababa</span>
                </p>
                <div class="details">
                    <div class="detail-item">
                        <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                        <span>150 sqm</span>
                    </div>
                    <div class="detail-item">
                        <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon">
                        <span>${property.bedroom.replace("bedroom", "")} Beds</span>
                    </div>
                    <div class="detail-item">
                        <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon">
                        <span>2 Baths</span>
                    </div>
                </div>
            </div>
        </a>
    `;
}

// Function to filter and display properties
function updatePropertyList() {
    let filteredProperties = properties.filter(p => 
        (propertyType.value === "all" || p.type === propertyType.value) &&
        (statusFilter.value === "all" || p.status === statusFilter.value) &&
        (bedroomFilter.value === "all" || p.bedroom === bedroomFilter.value)
    );

    // Apply price filter if status is selected
    if (statusFilter.value === "for-rent") {
        if (priceFilter.value === "less") {
            filteredProperties = filteredProperties.filter(p => p.price < 1000);
        } else if (priceFilter.value === "greater") {
            filteredProperties = filteredProperties.filter(p => p.price >= 1000);
        }
    } else if (statusFilter.value === "for-sale") {
        const priceRanges = {
            "90-200k": [90000, 200000],
            "200-500k": [200001, 500000],
            "500-1000k": [500001, 1000000],
            "1000-5000k": [1000001, 5000000]
        };
        if (priceFilter.value in priceRanges) {
            filteredProperties = filteredProperties.filter(p => 
                p.price >= priceRanges[priceFilter.value][0] && 
                p.price <= priceRanges[priceFilter.value][1]
            );
        }
    }

    // Check for no matches and display message if needed
    if (filteredProperties.length === 0) {
        propertyList.innerHTML = 
            '<p class="no-properties-message">No properties found</p>'; // Display message
        return; // Exit the function
    }

    // Pagination
    const start = (currentPage - 1) * itemsPerPage;
    const paginatedProperties = filteredProperties.slice(start, start + itemsPerPage);
    
    // Render properties
    propertyList.innerHTML = paginatedProperties.map(createPropertyCard).join("");

    // Add event listeners for image navigation
    addImageNavigationListeners();
}

// Function to update price filter options based on status
function updatePriceFilter() {
    priceFilter.innerHTML = "";
    priceFilter.style.display = "none";
    priceLabel.style.display = "none";

    if (statusFilter.value === "for-rent") {
        priceFilter.innerHTML = `
            <option value="less">Less than $1000/month</option>
            <option value="greater">Greater than $1000/month</option>
        `;
        priceFilter.style.display = "inline-block";
        priceLabel.style.display = "inline-block";
    } else if (statusFilter.value === "for-sale") {
        priceFilter.innerHTML = `
            <option value="90-200k">$90,000 - $200,000</option>
            <option value="200-500k">$200,000 - $500,000</option>
            <option value="500-1000k">$500,000 - $1,000,000</option>
            <option value="1000-5000k">$1,000,000 - $5,000,000</option>
        `;
        priceFilter.style.display = "inline-block";
        priceLabel.style.display = "inline-block";
    }
}

// Function to handle image navigation
function addImageNavigationListeners() {
    document.querySelectorAll(".property-card").forEach(card => {
        const leftArrow = card.querySelector(".arrow-left");
        const rightArrow = card.querySelector(".arrow-right");
        const imgElement = card.querySelector("img");
        const propertyId = parseInt(card.dataset.id);
        const property = properties.find(p => p.id === propertyId);
        let currentIndex = 0;

        // Function to update the image
        const updateImage = (index) => {
            imgElement.src = property.images[index];
        };

        leftArrow.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            currentIndex = (currentIndex - 1 + property.images.length) % property.images.length;
            //imgElement.src = property.images[currentIndex];
            updateImage(currentIndex); // Update the image source
        });

        rightArrow.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            currentIndex = (currentIndex + 1) % property.images.length;
            //imgElement.src = property.images[currentIndex];
            updateImage(currentIndex); // Update the image source
        });
    });
}

// Pagination event listeners
pageButtons.forEach(button => {
    button.addEventListener("click", () => {
        currentPage = parseInt(button.dataset.page);
        updatePropertyList();
    });
});

prevBtn.addEventListener("click", () => {
    if (currentPage > 1) currentPage--;
    updatePropertyList();
});

nextBtn.addEventListener("click", () => {
    if (currentPage < 3) currentPage++;
    updatePropertyList();
});

// Event Listeners
propertyType.addEventListener("change", updatePropertyList);
statusFilter.addEventListener("change", () => {
    updatePriceFilter();
    updatePropertyList();
});
bedroomFilter.addEventListener("change", updatePropertyList);
priceFilter.addEventListener("change", updatePropertyList);

// Initial Load
updatePropertyList();
