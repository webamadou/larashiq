/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import * as Popper from "@popperjs/core";
import $ from "jquery";
import "animate.css";

window.$ = window.jQuery = $;
window.Popper = Popper;
/*! Pushy - v1.4.0 - 2020-12-28
 * Pushy is a responsive off-canvas navigation menu using CSS transforms & transitions.
 * https://github.com/christophery/pushy/
 * by Christopher Yee */

(function ($) {
    var pushy = $(".pushy"), //menu css class
        body = $("body"),
        push = $(".push"), //css class to add pushy capability
        pushyLeft = "pushy-left", //css class for left menu position
        pushyOpenLeft = "pushy-open-left", //css class when menu is open (left position)
        pushyOpenRight = "pushy-open-right", //css class when menu is open (right position)
        siteOverlay = $(".site-overlay"), //site overlay
        menuLinkFocus = $(pushy.data("focus")), //focus on link when menu is open
        menuSpeed = 200, //jQuery fallback menu speed
        menuWidth = pushy.width() + "px", //jQuery fallback menu width
        submenuClass = ".pushy-submenu",
        submenuOpenClass = "pushy-submenu-open",
        submenuClosedClass = "pushy-submenu-closed";

    //check if menu-btn-selector data attribute exists
    if (typeof pushy.data("menu-btn-selector") !== "undefined") {
        var menuBtnClass = pushy.data("menu-btn-selector"); //take user defined menu button CSS class
    } else {
        var menuBtnClass = ".menu-btn"; //set default menu button CSS class
    }

    //css classes to toggle the menu
    var menuBtn = $(menuBtnClass + ", .pushy-link");

    //css class to focus when menu is closed w/ esc key
    var menuBtnFocus = $(menuBtnClass);

    // check if container-selector data attribute exists
    var containerSelector = "#container";
    if (typeof pushy.data("container-selector") !== "undefined") {
        containerSelector = pushy.data("container-selector");
    }
    var container = $(containerSelector);

    //close menu w/ esc key
    $(document).on("keyup", function (e) {
        //check if esc key is pressed
        if (e.keyCode == 27) {
            //check if menu is open
            if (body.hasClass(pushyOpenLeft) || body.hasClass(pushyOpenRight)) {
                if (cssTransforms3d) {
                    closePushy(); //close pushy
                } else {
                    closePushyFallback();
                    opened = false; //set menu state
                }

                //focus on menu button after menu is closed
                if (menuBtnFocus) {
                    menuBtnFocus.trigger("focus");
                }
            }
        }
    });

    function togglePushy() {
        //add class to body based on menu position
        if (pushy.hasClass(pushyLeft)) {
            body.toggleClass(pushyOpenLeft);
        } else {
            body.toggleClass(pushyOpenRight);
        }

        //focus on link in menu after css transition ends
        if (menuLinkFocus) {
            pushy.one("transitionend", function () {
                menuLinkFocus.trigger("focus");
            });
        }
    }

    function closePushy() {
        if (pushy.hasClass(pushyLeft)) {
            body.removeClass(pushyOpenLeft);
        } else {
            body.removeClass(pushyOpenRight);
        }
    }

    function openPushyFallback() {
        //animate menu position based on CSS class
        if (pushy.hasClass(pushyLeft)) {
            body.addClass(pushyOpenLeft);
            pushy.animate({ left: "0px" }, menuSpeed);
            container.animate({ left: menuWidth }, menuSpeed);
            //css class to add pushy capability
            push.animate({ left: menuWidth }, menuSpeed);
        } else {
            body.addClass(pushyOpenRight);
            pushy.animate({ right: "0px" }, menuSpeed);
            container.animate({ right: menuWidth }, menuSpeed);
            push.animate({ right: menuWidth }, menuSpeed);
        }

        //focus on link in menu
        if (menuLinkFocus) {
            menuLinkFocus.trigger("focus");
        }
    }

    function closePushyFallback() {
        //animate menu position based on CSS class
        if (pushy.hasClass(pushyLeft)) {
            body.removeClass(pushyOpenLeft);
            pushy.animate({ left: "-" + menuWidth }, menuSpeed);
            container.animate({ left: "0px" }, menuSpeed);
            //css class to add pushy capability
            push.animate({ left: "0px" }, menuSpeed);
        } else {
            body.removeClass(pushyOpenRight);
            pushy.animate({ right: "-" + menuWidth }, menuSpeed);
            container.animate({ right: "0px" }, menuSpeed);
            push.animate({ right: "0px" }, menuSpeed);
        }
    }

    function toggleSubmenu() {
        //hide submenu by default
        $(submenuClass).addClass(submenuClosedClass);

        $(submenuClass).on("click", function (e) {
            var selected = $(this);

            if (selected.hasClass(submenuClosedClass)) {
                //hide same-level opened submenus
                selected
                    .siblings(submenuClass)
                    .addClass(submenuClosedClass)
                    .removeClass(submenuOpenClass);
                //show submenu
                selected
                    .removeClass(submenuClosedClass)
                    .addClass(submenuOpenClass);
            } else {
                //hide submenu
                selected
                    .addClass(submenuClosedClass)
                    .removeClass(submenuOpenClass);
            }
            // prevent event to be triggered on parent
            e.stopPropagation();
        });
    }

    //checks if 3d transforms are supported removing the modernizr dependency
    var cssTransforms3d = (function csstransforms3d() {
        var el = document.createElement("p"),
            supported = false,
            transforms = {
                webkitTransform: "-webkit-transform",
                OTransform: "-o-transform",
                msTransform: "-ms-transform",
                MozTransform: "-moz-transform",
                transform: "transform",
            };

        if (document.body !== null) {
            // Add it to the body to get the computed style
            document.body.insertBefore(el, null);

            for (var t in transforms) {
                if (el.style[t] !== undefined) {
                    el.style[t] = "translate3d(1px,1px,1px)";
                    supported = window
                        .getComputedStyle(el)
                        .getPropertyValue(transforms[t]);
                }
            }

            document.body.removeChild(el);

            return (
                supported !== undefined &&
                supported.length > 0 &&
                supported !== "none"
            );
        } else {
            return false;
        }
    })();

    if (cssTransforms3d) {
        //toggle submenu
        toggleSubmenu();

        //toggle menu
        menuBtn.on("click", function () {
            togglePushy();
        });
        //close menu when clicking site overlay
        siteOverlay.on("click", function () {
            togglePushy();
        });
    } else {
        //add css class to body
        body.addClass("no-csstransforms3d");

        //hide menu by default
        if (pushy.hasClass(pushyLeft)) {
            pushy.css({ left: "-" + menuWidth });
        } else {
            pushy.css({ right: "-" + menuWidth });
        }

        //fixes IE scrollbar issue
        container.css({ "overflow-x": "hidden" });

        //keep track of menu state (open/close)
        var opened = false;

        //toggle submenu
        toggleSubmenu();

        //toggle menu
        menuBtn.on("click", function () {
            if (opened) {
                closePushyFallback();
                opened = false;
            } else {
                openPushyFallback();
                opened = true;
            }
        });

        //close menu when clicking site overlay
        siteOverlay.on("click", function () {
            if (opened) {
                closePushyFallback();
                opened = false;
            } else {
                openPushyFallback();
                opened = true;
            }
        });
    }
})(jQuery);

/**
 * Maptiler
 */
import maplibregl from "maplibre-gl"; // or "const maplibregl = require('maplibre-gl');"
window.maplibregl = maplibregl;

/* show/hide submenus on hover */
$(".immo-c-nav__item")
    .on("mouseover", function (e) {
        $(".immo-c-submenu.immo-c-nav__submenu")
            .css("visibility", "hidden")
            .css("opacity", 0)
            .css("transition", "inherit")
            .css("margin-top", "initial");

        $(this)
            .find(".immo-c-submenu.immo-c-nav__submenu")
            .css("visibility", "visible")
            .css("opacity", 1)
            .css("transition", "all ease-in-out .5s")
            .css("margin-top", "2.2rem");
    })
    .on("mouseout", function (e) {
        $(".immo-c-submenu.immo-c-nav__submenu")
            .css("visibility", "hidden")
            .css("opacity", 0)
            .css("transition", "inherit")
            .css("margin-top", "initial");
    });

/* back to top button */
$(document).scroll(function () {
    let y = $(this).scrollTop();
    if (y > 800) {
        $("#backToTop")
            .removeClass("animate__slideOutDown")
            .addClass("animate__slideInUp");
    } else {
        $("#backToTop")
            .addClass("animate__slideOutDown")
            .removeClass("animate__slideInUp");
    }
});

/* Widget contact corner right */
$(".menu-toggle .mdi.toggle-widget").click(function () {
    $(".menu-toggle").toggleClass("open");
    $(".menu-round").toggleClass("open");
    $(".menu-line").toggleClass("open");
});

/* Whatsapp widget activayion */
$("#wa-btn button, #widget-header .close").click(function (e) {
    e.preventDefault();
    $("#whatsapp-widget-wrapper").toggleClass("active");
    $("#wa-widget").toggleClass("animate__animated animate__slideInUp");
});
$(function () {
    /* $(".form-check-input").on("click", function (e) {
        // Remove border on all image input
        // $(".form-check-input").css("border", "none");

        const input_id = $(this).attr("id");
        const img = $(`#${input_id} + img`);

        if ($(`#${input_id}`).is(":checked")) {
            console.log(`${input_id} "This is checked"`);
            img.css("border", "3px solid var(--immopurple)");
        } else {
            img.css("border", "none");
            console.log(`${input_id} "this is unchecked"`);
        }
    }); */
});
