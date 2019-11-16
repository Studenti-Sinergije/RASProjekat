var currentPage = getCurrentPage()
var navItems = document.getElementsByName("nav-item");

navItems.forEach(function(item) {
    if (item.href.includes(currentPage)) {
        item.classList.add("active");
    }
});

console.log(currentPage);

function getCurrentPage() {
    var link = window.location.href.split("/");
    var lastElem = link[link.length - 1];
    var rawPageName = lastElem.split(".");
    return rawPageName[0];
}
