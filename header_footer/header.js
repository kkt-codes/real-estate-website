//const menu = document.querySelector('.navbar');

/* menu.addEventListener('click',()=>{
    navbar.classList.add('show')
}) */

document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const sidebar = document.querySelector(".sidebar");
    const closeSidebarButton = document.querySelector(".close-sidebar-button");
    const navList = document.querySelector(".nav-list");
    const navItems = document.querySelectorAll(".nav-item");

    // Function to toggle visibility of the hamburger menu based on screen size
    function toggleHamburgerMenu() {
        if (window.innerWidth > 1092) {
            hamburgerMenu.style.display = 'none'; // Hide hamburger menu on larger screens
        } else {
            hamburgerMenu.style.display = 'block'; // Show hamburger menu on smaller screens
        }
    }

    // Initial check on page load
    toggleHamburgerMenu();

    // Window resize event to toggle hamburger menu visibility
    window.addEventListener('resize', toggleHamburgerMenu);
    
    // Toggle sidebar visibility
    hamburgerMenu.addEventListener("click", function() {
        sidebar.classList.add("active");
        navList.classList.add("active");
        hamburgerMenu.style.display = 'none'; // Hide hamburger menu
    });

    // Close sidebar
    closeSidebarButton.addEventListener("click", function() {
        sidebar.classList.remove("active");
        navList.classList.remove("active");
        hamburgerMenu.style.display = 'block'; // Show hamburger menu again
    });

    // Toggle submenus only on click for smaller screens (<= 1092px)
    navItems.forEach(item => {
        const link = item.querySelector(".link");
        const subMenu = item.querySelector(".sub-menu");

        if (subMenu) {
            link.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default link behavior for small screens
                subMenu.classList.toggle("active");
                if (window.innerWidth <= 1092) {
                    subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block'; // Toggle display on small screens
                }
            });
        }
    });

    // Reset submenu display for larger screens
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1092) {
            document.querySelectorAll('.sub-menu').forEach(subMenu => {
                subMenu.style.display = ''; // Clear the inline display style for larger screens
            });
        }
    });
});
    