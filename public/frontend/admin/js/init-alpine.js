function data() {
    function getThemeFromLocalStorage() {
        // if user already changed the theme, use it
        if (window.localStorage.getItem("dark")) {
            return JSON.parse(window.localStorage.getItem("dark"));
        }

        // else return their preferences
        return (
            !!window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        );
    }

    function setThemeToLocalStorage(value) {
        window.localStorage.setItem("dark", value);
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark;
            setThemeToLocalStorage(this.dark);
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false;
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false;
        },
        isStoreMenuOpen: false,
        toggleStoreMenu() {
            this.isStoreMenuOpen = !this.isStoreMenuOpen;
        },
        isManagementMenuOpen: false,
        toggleManagementMenu() {
            this.isManagementMenuOpen = !this.isManagementMenuOpen;
        },
        // Modal
        isModalOpen: false,
        trapCleanup: null,
        openModal() {
            this.isModalOpen = true;
            this.trapCleanup = focusTrap(document.querySelector("#modal"));
        },
        closeModal() {
            this.isModalOpen = false;
            this.trapCleanup();
        },
    };
}

document.addEventListener("DOMContentLoaded", function () {
    const app = data(); // Create an instance of your data

    const currentRoute = window.location.pathname;
    if (
        currentRoute.includes("webshop-laravel/admin/user") ||
        currentRoute.includes("webshop-laravel/admin/order")
    ) {
        const sidebarMenu = document.querySelectorAll("[x-data]");

        sidebarMenu.forEach((menu) => {
            if (menu.__x && menu.__x.$data) {
                const activeNode = document.querySelector(".management-active");
                if (activeNode) {
                    menu.__x.$data.isManagementMenuOpen = true;
                    activeNode.classList.remove("hidden");
                }
            }
        });
    } else if (
        currentRoute.includes("webshop-laravel/admin/product") ||
        currentRoute.includes("webshop-laravel/admin/voucher")
    ) {
        const sidebarMenu = document.querySelectorAll("[x-data]");

        sidebarMenu.forEach((menu) => {
            if (menu.__x && menu.__x.$data) {
                const activeNode = document.querySelector(".store-active");
                if (activeNode) {
                    menu.__x.$data.isStoreMenuOpen = true;
                    activeNode.classList.remove("hidden");
                }
            }
        });
    } else if (currentRoute.includes("webshop-laravel/admin/dashboard")) {
        const activeNode = document.querySelector(".dashboard-active");
        if (activeNode) {
            activeNode.classList.remove("hidden");
        }
    }

    //onClick
    const allSideMenu = document.querySelectorAll(".sidebar-item");
    allSideMenu.forEach((item) => {
        const childActive = item.children[0];

        item.addEventListener("click", function () {
            allSideMenu.forEach((i) => {
                i.children[0].classList.add("hidden");
                console.log(i.children[0]);
            });
            childActive.classList.remove("hidden");
        });
    });
});
