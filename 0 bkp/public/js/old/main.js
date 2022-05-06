$(document).ready(function () {
  $(".btn-sideBar-SubMenu").on("click", function (e) {
    e.preventDefault();
    var SubMenu = $(this).next("ul");
    var iconBtn = $(this).children(".zmdi-caret-down");
    if (SubMenu.hasClass("show-sideBar-SubMenu")) {
      iconBtn.removeClass("zmdi-hc-rotate-180");
      SubMenu.removeClass("show-sideBar-SubMenu");
    } else {
      iconBtn.addClass("zmdi-hc-rotate-180");
      SubMenu.addClass("show-sideBar-SubMenu");
    }
  });
  $(".btn-exit-system").on("click", function (e) {
    e.preventDefault();
    swal({
      title: "¿Estás seguro?",
      text: "La sesión actual se cerrará.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#03A9F4",
      cancelButtonColor: "#F44336",
      confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
      cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!',
    }).then(function () {
      window.location = `${window.location.origin}/index.php?logout=1`;
    });
  });
  function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf("/") + 0);
    return loc.href.substring(
      0,
      loc.href.length -
        ((loc.pathname + loc.search + loc.hash).length - pathName.length)
    );
  }
  $(".btn-menu-dashboard").on("click", function (e) {
    e.preventDefault();
    var body = $(".dashboard-contentPage");
    var sidebar = $(".dashboard-sideBar");
    if (sidebar.css("pointer-events") == "none") {
      body.removeClass("no-paddin-left");
      sidebar.removeClass("hide-sidebar").addClass("show-sidebar");
    } else {
      body.addClass("no-paddin-left");
      sidebar.addClass("hide-sidebar").removeClass("show-sidebar");
    }
  });
});
(function ($) {
  $(window).on("load", function () {
    $(".dashboard-sideBar-ct").mCustomScrollbar({
      theme: "light-thin",
      scrollbarPosition: "inside",
      autoHideScrollbar: true,
      scrollButtons: { enable: true },
    });
    $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
      theme: "dark-thin",
      scrollbarPosition: "inside",
      autoHideScrollbar: true,
      scrollButtons: { enable: true },
    });
  });
})(jQuery);
