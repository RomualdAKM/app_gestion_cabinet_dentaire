/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/sidebar.js ***!
  \*********************************/


var sidebarLinksList = document.querySelector('.sidebar-links');
var subMenus = document.querySelector('.sidebar-submenu');
var url = window.location.href;
var urlLink = url.includes('#') ? url.split('#')[0] : url;
var submenuLinks = document.querySelectorAll('.sidebar-list a');
var allList = document.querySelectorAll('.sidebar-list');
var shoppingPlaceSidebar = document.querySelector('.shopping-place-sidebar');
var reportSidebar = document.querySelector('.report-sidebar');
var projectSidebar = document.querySelector('.project-sidebar');
// active menu js
var slideUp = function slideUp(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
  if (target) {
    target.style.transitionProperty = 'height, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    window.setTimeout(function () {
      target.style.display = 'none';
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }
};
var slideDown = function slideDown(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
  if (target) {
    target.style.removeProperty('display');
    var display = window.getComputedStyle(target).display;
    if (display === 'none') display = 'flex';
    target.style.display = display;
    var height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = 'height, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    window.setTimeout(function () {
      target.style.removeProperty('height');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }
};
submenuLinks.forEach(function (el) {
  var linkHref = el.href;
  if (urlLink === linkHref && !reportSidebar) {
    el.classList.add('active');
    el.closest('.sidebar-list').classList.add('active');
  }
});
var elOpen;
allList.forEach(function (el) {
  el.addEventListener('click', function (e) {
    if (shoppingPlaceSidebar && !reportSidebar) {
      allList.forEach(function (item) {
        if (item.classList.contains('active')) {
          slideUp(item.querySelector('.sidebar-submenu'));
        }
        item.classList.remove('active');
      });
    } else {
      allList.forEach(function (item) {
        if (item !== el) {
          if (item.classList.contains('active')) {
            slideUp(item.querySelector('.sidebar-submenu'));
          }
          item.classList.remove('active');
        }
      });
    }
    el.classList.toggle('active');
    elOpen = el;
    if (el.classList.contains('active')) {
      slideDown(el.querySelector('.sidebar-submenu'));
    } else {
      slideUp(el.querySelector('.sidebar-submenu'));
    }
  });
});
var sidebarHeaderToggle = document.querySelector('.sidebar-toggle');
var sidebarBtn = document.querySelector('.sidebar-btn');
var sidebar = document.querySelector('.unique-sidebar');
var pageBodyWrapper = document.querySelector('.page-body-wrapper');
var headerMain = document.querySelector('header');
var headerLogoShowOptions = document.querySelector('.sidebar-hide-logo-show');
sidebarBtn === null || sidebarBtn === void 0 || sidebarBtn.addEventListener('click', function (e) {
  sidebar.classList.toggle('hide-show-sidebar');
  sidebarHeaderToggle.classList.toggle('hide');
  headerLogoShowOptions === null || headerLogoShowOptions === void 0 || headerLogoShowOptions.classList.toggle('hide');
  pageBodyWrapper.classList.toggle('!w-full');
  headerMain.classList.toggle('!w-full');
});
sidebarHeaderToggle === null || sidebarHeaderToggle === void 0 ? void 0 : sidebarHeaderToggle.addEventListener('click', function (e) {
  var _this$closest;
  sidebar.classList.toggle('hide-show-sidebar');
  sidebarHeaderToggle.classList.toggle('hide');
  (_this$closest = this.closest('.sidebar-hide-logo-show')) === null || _this$closest === void 0 || _this$closest.classList.toggle('hide');
  pageBodyWrapper.classList.toggle('!w-full');
  headerMain.classList.toggle('!w-full');
});
/******/ })()
;