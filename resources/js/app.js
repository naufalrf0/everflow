import Alpine from 'alpinejs';
import axios from 'axios';

// Attach Alpine and axios to the global window object
window.Alpine = Alpine;
window.axios = axios;

// Initialize Alpine
Alpine.start();

// Initialize other components or functions
document.addEventListener("DOMContentLoaded", function () {
    initMetisMenu();
    initCounterNumber();
    initLeftMenuCollapse();
    initActiveMenu();
    initHoriMenuActive();
    initFullScreen();
    initDropdownMenu();
    initComponents();
    initMenuItemScroll();
    initCheckAll();

    // Set default headers for axios
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
});

// Function to initialize MetisMenu
function initMetisMenu() {
    if (document.getElementById("side-menu")) {
        new MetisMenu('#side-menu');
    }
}

// Function to initialize the counter number
function initCounterNumber() {
    var counter = document.querySelectorAll('.counter-value');
    var speed = 250; // The lower the slower
    counter && counter.forEach(function (counter_value) {
        function updateCount() {
            var target = +counter_value.getAttribute('data-target');
            var count = +counter_value.innerText;
            var inc = target / speed;
            if (inc < 1) {
                inc = 1;
            }
            // Check if target is reached
            if (count < target) {
                // Add inc to count and output in counter_value
                counter_value.innerText = (count + inc).toFixed(0);
                // Call function every ms
                setTimeout(updateCount, 1);
            } else {
                counter_value.innerText = target;
            }
        }
        updateCount();
    });
}

// Function to handle left menu collapse
function initLeftMenuCollapse() {
    var currentSIdebarSize = document.body.getAttribute('data-sidebar-size');
    window.onload = function () {
        if (window.innerWidth >= 1024 && window.innerWidth <= 1366) {
            document.body.setAttribute('data-sidebar-size', 'sm');
            updateRadio('sidebar-size-small');
        }
    };
    var verticalButton = document.getElementsByClassName("vertical-menu-btn");
    for (var i = 0; i < verticalButton.length; i++) {
        (function (index) {
            verticalButton[index] && verticalButton[index].addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sidebar-enable');
                if (window.innerWidth >= 992) {
                    if (currentSIdebarSize == null) {
                        (document.body.getAttribute('data-sidebar-size') == null || document.body.getAttribute('data-sidebar-size') == "lg") 
                            ? document.body.setAttribute('data-sidebar-size', 'sm') 
                            : document.body.setAttribute('data-sidebar-size', 'lg');
                    } else if (currentSIdebarSize == "md") {
                        (document.body.getAttribute('data-sidebar-size') == "md") 
                            ? document.body.setAttribute('data-sidebar-size', 'sm') 
                            : document.body.setAttribute('data-sidebar-size', 'md');
                    } else {
                        (document.body.getAttribute('data-sidebar-size') == "sm") 
                            ? document.body.setAttribute('data-sidebar-size', 'lg') 
                            : document.body.setAttribute('data-sidebar-size', 'sm');
                    }
                } else {
                    initMenuItemScroll();
                }
            });
        })(i);
    }
}

// Function to activate the current menu based on URL
function initActiveMenu() {
    setTimeout(function () {
        var menuItems = document.querySelectorAll("#sidebar-menu a");
        menuItems && menuItems.forEach(function (item) {
            var pageUrl = window.location.href.split(/[?#]/)[0];

            if (item.href == pageUrl) {
                item.classList.add("active");
                var parent = item.parentElement;
                if (parent && parent.id !== "side-menu") {
                    parent.classList.add("mm-active");
                    var parent2 = parent.parentElement; // ul
                    if (parent2 && parent2.id !== "side-menu") {
                        parent2.classList.add("mm-show"); // ul
                        var parent3 = parent2.parentElement; // li
                        if (parent3 && parent3.id !== "side-menu") {
                            parent3.classList.add("mm-active"); // li
                            var parent4 = parent3.parentElement; // ul
                            if (parent4 && parent4.id !== "side-menu") {
                                parent4.classList.add("mm-show"); // ul
                                var parent5 = parent4.parentElement;
                                if (parent5 && parent5.id !== "side-menu") {
                                    parent5.classList.add("mm-active"); // li
                                }
                            }
                        }
                    }
                }
            }
        });
    }, 0);
}

// Function to scroll to active menu item
function initMenuItemScroll() {
    setTimeout(function () {
        var sidebarMenu = document.getElementById("side-menu");
        if (sidebarMenu) {
            var activeMenu = sidebarMenu.querySelector(".mm-active .active");
            var offset = (activeMenu) ? activeMenu.offsetTop : 0;
            if (offset > 300) {
                offset = offset - 100;
                var verticalMenu = document.getElementsByClassName("vertical-menu")[0];
                if (verticalMenu && verticalMenu.querySelector(".simplebar-content-wrapper")) {
                    setTimeout(function () {
                        verticalMenu.querySelector(".simplebar-content-wrapper").scrollTop = offset;
                    }, 0);
                }
            }
        }
    }, 0);
}

// Function to activate horizontal menu based on URL
function initHoriMenuActive() {
    var navlist = document.querySelectorAll(".navbar-nav a");
    navlist && navlist.forEach(function (item) {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (item.href == pageUrl) {
            item.classList.add("active");
            var parent = item.parentElement;
            if (parent) {
                parent.classList.add("active"); // li
                var parent2 = parent.parentElement;
                parent2.classList.add("active"); // li
                var parent3 = parent2.parentElement;
                if (parent3) {
                    parent3.classList.add("active"); // li
                    var parent4 = parent3.parentElement;
                    if (parent4.closest("li"))
                        parent4.closest("li").classList.add("active");
                    if (parent4) {
                        parent4.classList.add("active"); // li
                        var parent5 = parent4.parentElement;
                        if (parent5) {
                            parent5.classList.add("active"); // li
                            var parent6 = parent5.parentElement;
                            if (parent6) {
                                parent6.classList.add("active"); // li
                            }
                        }
                    }
                }
            }
        }
    });
}

// Function to initialize fullscreen mode
function initFullScreen() {
    var fullscreenBtn = document.querySelector('[data-toggle="fullscreen"]');
    fullscreenBtn && fullscreenBtn.addEventListener('click', function (e) {
        e.preventDefault();
        document.body.classList.toggle('fullscreen-enable');
        if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    });

    document.addEventListener('fullscreenchange', exitHandler);
    document.addEventListener("webkitfullscreenchange", exitHandler);
    document.addEventListener("mozfullscreenchange", exitHandler);

    function exitHandler() {
        if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
            document.body.classList.remove('fullscreen-enable');
        }
    }
}

// Function to initialize dropdown menus
function initDropdownMenu() {
    if (document.getElementById("topnav-menu-content")) {
        var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
        for (var i = 0, len = elements.length; i < len; i++) {
            elements[i].onclick = function (elem) {
                if (elem.target.getAttribute("href") === "#") {
                    elem.target.parentElement.classList.toggle("active");
                    elem.target.nextElementSibling.classList.toggle("show");
                }
            };
        }
        window.addEventListener("resize", updateMenu);
    }
}

// Function to update dropdown menu on resize
function updateMenu() {
    var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
    for (var i = 0, len = elements.length; i < len; i++) {
        if (elements[i].parentElement.getAttribute("class") === "nav-item dropdown active") {
            elements[i].parentElement.classList.remove("active");
            elements[i].nextElementSibling.classList.remove("show");
        }
    }
}

// Function to initialize tooltips, popovers, and toasts
function initComponents() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl);
    });
}

// Function to fade out elements
function fadeOutEffect(elem, delay) {
    var fadeTarget = document.getElementById(elem);
    fadeTarget.style.display = 'block';
    var fadeEffect = setInterval(function () {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.2;
        } else {
            clearInterval(fadeEffect);
            fadeTarget.style.display = 'none';
        }
    }, 200);
}

// Function to initialize the preloader
function initPreloader() {
    window.onload = function () {
        if (document.getElementById("preloader")) {
            fadeOutEffect('pre-status', 300);
            fadeOutEffect('preloader', 400);
        }
    };
}

// Function to update the selected radio button
function updateRadio(radioId) {
    if (document.getElementById(radioId))
        document.getElementById(radioId).checked = true;
}

// Function to initialize "Check All" functionality
function initCheckAll() {
    var checkAll = document.getElementById("checkAll");
    if (checkAll) {
        checkAll.onclick = function () {
            var checkboxes = document.querySelectorAll('.table-check input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        };
    }
}
