/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! -----------------------------------------------------------------------------------

    Template Name: Govo Admin
    Template URI: http://admin.pixelstrap.com/govo/theme
    Description: This is Admin theme
    Author: Pixelstrap
    Author URI: https://themeforest.net/user/pixelstrap

-----------------------------------------------------------------------------------

        01. Hex Code Convert To Rgba Number Js
        02. Search Js
        03. Language Select Js
        04. Header Drop Down Toggle
        05. Plus Minus Item Js 
        06. Cart Item Remove js
        07. Tabs Js
        08. Copy Js
        09. Collapse Js
        10. Countdown Js
        11. Todo List Edit Delete Js 
        12. Password Show hide js
        13. Close alert js 
        14. Wishlist Remove js
        15. List-item Remove js
        16. Following js
        17. Add Friends js
        18. suggestion js
        19. Fill svg js
        20. Accept voice call js
        21. Blog sidebar js

 --------------------------------------------------------------------------------- */

/*========================
  1. Hex Code Convert To Rgba Number Js
 ==============================*/



window.addEventListener('load', function () {
  var bgImg = document.querySelectorAll('.bg-img');
  for (i = 0; i < bgImg.length; i++) {
    var bgImgEl = bgImg[i];
    /// Optional Class Add ///
    if (bgImgEl.classList.contains('bg-top')) {
      bgImgEl.parentNode.classList.add('b-top');
    } else if (bgImgEl.classList.contains('bg-bottom')) {
      bgImgEl.parentNode.classList.add('b-buttom');
    } else if (bgImgEl.classList.contains('bg-center')) {
      bgImgEl.parentNode.classList.add('b-center');
    } else if (bgImgEl.classList.contains('bg-left')) {
      bgImgEl.parentNode.classList.add('b-left');
    } else if (bgImgEl.classList.contains('bg-right')) {
      bgImgEl.parentNode.classList.add('b-right');
    }

    /// Lazyloader Class Add ///
    if (bgImgEl.classList.contains('blur-up')) {
      bgImgEl.parentNode.classList.add('blur-up', 'lazyload');
    }

    /// Size Class Add ///
    if (bgImgEl.classList.contains('bg_size_content')) {
      bgImgEl.parentNode.classList.add('b_size_content');
    }

    /// Ratio Style ///
    bgImgEl.parentNode.classList.add('bg-size');
    var bgSrc = bgImgEl.src;
    bgImgEl.style.display = 'none';
  }
});

/*========================
  2. Search Js
 ==============================*/

var searchShow = document.querySelector('.search-show');
var searchClose = document.querySelector('.search-close');
var searchBoxWrapper = document.querySelector('.search-box-wrapper');
searchShow === null || searchShow === void 0 || searchShow.addEventListener('click', function () {
  searchBoxWrapper.classList.remove('lg:scale-0', 'lg:opacity-0', 'lg:invisible');
});
searchClose === null || searchClose === void 0 || searchClose.addEventListener('click', function () {
  searchBoxWrapper.classList.add('lg:scale-0', 'lg:opacity-0', 'lg:invisible');
});

/*========================
  3. Language Select Js
 ==============================*/

var languageSelect = document.querySelector('.language-select');
var languageSelectBtn = document.getElementById('language-select');
var languageList = document.querySelector('.language-menu');
languageList === null || languageList === void 0 || languageList.addEventListener('click', function (e) {
  var language = e.target.closest('.language-option');
  if (!language) return;
  var languageValue = language.dataset.value;
  var flagImage = language.querySelector('img').src;
  languageSelectBtn.querySelector('img').src = flagImage;
  languageSelectBtn.querySelector('span').textContent = languageValue;
});

/*=====================
  4. Header Drop Down Toggle
==========================*/
var headerDropdownMenu = document.querySelectorAll('.dropdown');
document.body.addEventListener('click', function (event) {
  var _dropdownEl$closest;
  var dropdownEl = event.target.closest('.dropdown');
  var visible = dropdownEl === null || dropdownEl === void 0 || (_dropdownEl$closest = dropdownEl.closest('.dropdown')) === null || _dropdownEl$closest === void 0 ? void 0 : _dropdownEl$closest.classList.contains('show');
  var dropdownMenuElement = event.target.closest('.dropdown-menu');
  headerDropdownMenu.forEach(function (item) {
    if (!dropdownMenuElement) {
      item.classList.remove('show');
    }
  });
  if (!dropdownEl) return;
  if (!visible && !dropdownEl.classList.contains('on-hover-show')) dropdownEl === null || dropdownEl === void 0 || dropdownEl.classList.add('show');
});

/*=====================
  5. Plus Minus Item Js 
==========================*/
var plusMinus = document.querySelectorAll('.plus-minus ');
plusMinus.forEach(function (element) {
  var addButton = element.querySelector('.add');
  var subButton = element.querySelector('.sub');
  addButton === null || addButton === void 0 || addButton.addEventListener('click', function () {
    var inputEl = this.parentNode.querySelector("input[type='number']");
    if (inputEl.value < 20) {
      inputEl.value = Number(inputEl.value) + 1;
    }
  });
  subButton === null || subButton === void 0 || subButton.addEventListener('click', function () {
    var inputEl = this.parentNode.querySelector("input[type='number']");
    if (inputEl.value >= 2) {
      inputEl.value = Number(inputEl.value) - 1;
    }
  });
});

/*=====================
  6. Cart Item Remove js
==========================*/
var cartBagProduct = document.querySelector('.shopping-bag');
var cartRemoveBtn = cartBagProduct === null || cartBagProduct === void 0 ? void 0 : cartBagProduct.querySelectorAll('.remove-cart');
cartRemoveBtn === null || cartRemoveBtn === void 0 || cartRemoveBtn.forEach(function (el) {
  el.addEventListener('click', function () {
    this.closest('.cart-item').style.display = 'none';
  });
});

/*=====================
  7. Tabs Js
==========================*/
var tabs = document.querySelectorAll('.tabs');
tabs === null || tabs === void 0 || tabs.forEach(function (tab) {
  tab.addEventListener('click', function (event) {
    var _navLink$closest;
    var navLink = event.target.closest('.tab-link');
    if (!navLink) return;
    var allNavLinks = (_navLink$closest = navLink.closest('.tab-links')) === null || _navLink$closest === void 0 ? void 0 : _navLink$closest.querySelectorAll('.tab-link');
    console.log(allNavLinks);
    allNavLinks.forEach(function (navLink) {
      navLink.classList.remove('tab-active');
    });
    navLink.classList.add('tab-active');
    var currentTabContent = navLink.dataset.tabfilter;
    var tabContents = navLink.closest('.tabs').parentElement.querySelectorAll('.tab-pan');
    tabContents.forEach(function (tabContent) {
      tabContent.classList.remove('active');
      setTimeout(function () {
        tabContent.classList.remove('show');
      }, 400);
      tabContent.classList.remove('show');
      if (tabContent.dataset.tabcontent === currentTabContent) {
        tabContent.classList.add('active');
        setTimeout(function () {
          tabContent.classList.add('show');
        }, 400);
      }
    });
  });
});

/*=====================
  8. Copy Js
==========================*/

// Copy Function
function copyFunction() {
  var _this = this;
  var BtnParentEl = this.closest('.copyParent').querySelector('pre').textContent;
  navigator.clipboard.writeText(BtnParentEl);
  this.innerHTML = " \n      <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-check-circle\">\n        <path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"></path><polyline points=\"22 4 12 14.01 9 11.01\"></polyline>\n      </svg>";
  setTimeout(function () {
    _this.innerHTML = "\n    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clipboard\">\n      <path d=\"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2\"></path><rect x=\"8\" y=\"2\" width=\"8\" height=\"4\" rx=\"1\" ry=\"1\"></rect>\n    </svg>";
  }, 1500);
}
var copyBtn = document.querySelectorAll('.copyBtn');
copyBtn === null || copyBtn === void 0 || copyBtn.forEach(function (copyBtn) {
  copyBtn.addEventListener('click', copyFunction);
});

/*=====================
  9. Collapse Js
==========================*/

var accItem = document.getElementsByClassName('accordionItem');
var accHD = document.getElementsByClassName('accordionItemHeading');
for (i = 0; i < accHD.length; i++) {
  accHD[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
  var itemClass = this.parentNode.className;
  for (i = 0; i < accItem.length; i++) {
    accItem[i].className = 'accordionItem close';
  }
  if (itemClass == 'accordionItem close') {
    this.parentNode.className = 'accordionItem open';
  }
}

/*=====================
  10. Countdown Js
==========================*/

window.addEventListener('load', function () {
  var countDownDate = new Date('October 05, 2023 15:37:25').getTime();
  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
    var seconds = Math.floor(distance % (1000 * 60) / 1000);

    // Output the result in an element with id="timer"
    var timerEl = document.querySelectorAll('.timer');
    timerEl.forEach(function (el) {
      if (el.querySelector('.days')) {
        el.querySelector('.days').innerHTML = days;
      }
      if (el.querySelector('.hours')) {
        el.querySelector('.hours').innerHTML = hours;
      }
      if (el.querySelector('.minutes')) {
        el.querySelector('.minutes').innerHTML = minutes;
      }
      if (el.querySelector('.seconds')) {
        el.querySelector('.seconds').innerHTML = seconds;
      }
    });
    if (distance < 0) {
      clearInterval(x);
      document.getElementById('demo').innerHTML = 'EXPIRED';
    }
  }, 1000);
});

/*=====================
  11. Todo List Edit Delete Js 
  ==========================*/
var todoList = document.querySelectorAll('.todo-list');
todoList === null || todoList === void 0 || todoList.forEach(function (el) {
  var removeAttrFn = function removeAttrFn() {
    var _el$querySelector;
    (_el$querySelector = el.querySelector('[contenteditable]')) === null || _el$querySelector === void 0 || _el$querySelector.removeAttribute('contenteditable');
  };
  el.addEventListener('click', function (event) {
    var edit = event.target.closest('.edit');
    var remove = event.target.closest('.delete');
    var editRemove = event.target.closest('[contenteditable]');
    if (!editRemove) {
      removeAttrFn();
    }
    if (!edit && !remove) return;
    if (remove) {
      remove.closest('.todo-item').remove();
    }
    if (edit) {
      edit.closest('.todo-item').querySelector('.edit-div').setAttribute('contenteditable', true);
      edit.closest('.todo-item').querySelector('.edit-div').focus();
    }
  });
});

/*=====================
 13. Close alert js
==========================*/

var alert_del = document.querySelectorAll('.alert-del');
alert_del.forEach(function (x) {
  return x.addEventListener('click', function () {
    x.parentElement.classList.add('hidden');
  });
});

/*=====================
 14. Wishlist Remove js
==========================*/
var wishlistProduct = document.querySelectorAll('.wishlist-box');
wishlistProduct === null || wishlistProduct === void 0 || wishlistProduct.forEach(function (el) {
  var deleteButton = el.querySelector('.delete-button');
  deleteButton.addEventListener('click', function () {
    this.closest('.col-span-3').style.display = 'none';
  });
});

/*=====================
  15. List-item Remove js
==========================*/
var invoiceBox = document.querySelector('.invoice , .cart-main, .user-info');
var invoiceRemove = invoiceBox === null || invoiceBox === void 0 ? void 0 : invoiceBox.querySelectorAll('.remove-invoice , .remove-cart, .remove-user');
invoiceRemove === null || invoiceRemove === void 0 || invoiceRemove.forEach(function (el) {
  el.addEventListener('click', function () {
    this.closest('.invoice-item , .cart-item, .user-item').style.display = 'none';
  });
});

/*=====================
 16. Following js
==========================*/

var followFriend = document.querySelectorAll('.follow-friend');
followFriend === null || followFriend === void 0 || followFriend.forEach(function (el) {
  var followButton = el.querySelector('.follow-btn');
  followButton.addEventListener('click', function () {
    followButton.innerHTML = "<btn style=\"background-color: #44588f; color:white; padding:4px; border-radius:4px\">Following<btn>";
    followButton.style.padding = "0px";
  });
});

/*=====================
 17. Add Friends js
==========================*/

var addFriend = document.querySelectorAll('.add-friend');
addFriend === null || addFriend === void 0 || addFriend.forEach(function (el) {
  var addButton = el.querySelector('.add-btn');
  addButton.addEventListener('click', function () {
    addButton.innerHTML = "<btn style=\"background-color: #FF6150; color:white; padding:4px; border-radius:4px\">Added<btn>";
    addButton.style.padding = "0px";
  });
});

/*=====================
 18. suggestion js
==========================*/

var suggest = document.querySelectorAll('.suggest-friend');
suggest === null || suggest === void 0 || suggest.forEach(function (el) {
  var suggestButton = el.querySelector('.suggest-btn');
  suggestButton.addEventListener('click', function () {
    suggestButton.innerHTML = "<svg class=\"w-6 h-6 stroke-white bg-primary p-1\">\n                                <use href=\"../../assets/svg/sprite.svg#Profile\"></use> \n                              </svg>";
    suggestButton.style.padding = "0px";
  });
});

/*=====================
 19. Fill svg js
==========================*/

var postMedia = document.querySelector('.post-media');
var postLike = document.querySelectorAll('.post-like');
var wishLike = document.querySelectorAll('.wish-like');
var postDisLike = document.querySelectorAll('.post-dislike');
postLike === null || postLike === void 0 || postLike.forEach(function (el) {
  el.addEventListener('click', function () {
    var _this$closest, _this$closest2;
    (_this$closest = this.closest('.post-media')) === null || _this$closest === void 0 || _this$closest.classList.add('post-liked');
    (_this$closest2 = this.closest('.post-media')) === null || _this$closest2 === void 0 || _this$closest2.classList.remove('post-disliked');
  });
});
postDisLike === null || postDisLike === void 0 || postDisLike.forEach(function (el) {
  el.addEventListener('click', function () {
    var _this$closest3, _this$closest4;
    (_this$closest3 = this.closest('.post-media')) === null || _this$closest3 === void 0 || _this$closest3.classList.add('post-disliked');
    (_this$closest4 = this.closest('.post-media')) === null || _this$closest4 === void 0 || _this$closest4.classList.remove('post-liked');
  });
});
wishLike === null || wishLike === void 0 || wishLike.forEach(function (el) {
  el.addEventListener('click', function () {
    var _this$closest5;
    (_this$closest5 = this.closest('.post-media')) === null || _this$closest5 === void 0 || _this$closest5.classList.toggle('wish-liked');
  });
});

/*=====================
 20. Accept voice call js
==========================*/

var acceptCallEnd = document.querySelector('.accept-call-end');
var acceptCallStart = document.querySelector('.accept-call-start');
var CallStartBtn = document.getElementsByClassName('call-start-btn');
var CallStartShow = document.querySelector('.call-start-show');
var CallEnd = document.querySelector('.call-end');
var CallStartEnd = document.querySelector('.call-start-end');
CallEnd === null || CallEnd === void 0 || CallEnd.addEventListener('click', function () {
  var _this$closest6, _this$closest7;
  (_this$closest6 = this.closest('.accept-call-end')) === null || _this$closest6 === void 0 || _this$closest6.classList.add('hide');
  (_this$closest7 = this.closest('.accept-call-end')) === null || _this$closest7 === void 0 || _this$closest7.classList.remove('show');
  acceptCallStart === null || acceptCallStart === void 0 || acceptCallStart.classList.remove('show');
  CallStartShow === null || CallStartShow === void 0 || CallStartShow.classList.remove('show');
});
CallStartShow === null || CallStartShow === void 0 || CallStartShow.addEventListener('click', function () {
  acceptCallStart === null || acceptCallStart === void 0 || acceptCallStart.classList.remove('show');
  acceptCallEnd.classList.add('show');
});
for (var i = 0; i < CallStartBtn.length; i++) {
  var _CallStartBtn$i;
  (_CallStartBtn$i = CallStartBtn[i]) === null || _CallStartBtn$i === void 0 || _CallStartBtn$i.addEventListener('click', function (e) {
    acceptCallEnd.classList.remove('hide');
    acceptCallStart.classList.add('show');
  });
}
CallStartEnd === null || CallStartEnd === void 0 || CallStartEnd.addEventListener('click', function () {
  acceptCallStart === null || acceptCallStart === void 0 || acceptCallStart.classList.remove('show');
});

/*=====================
 21. Blog sidebar js
==========================*/

var blogSidebarToggle = document.querySelector('.blog-toggle');
var blogSidebar = document.querySelector('.blog-sidebar');
var blogCloseBtn = document.querySelector('.blog-close-sidebar');
blogSidebarToggle === null || blogSidebarToggle === void 0 || blogSidebarToggle.addEventListener('click', function () {
  blogSidebar.classList.toggle('show');
});
blogCloseBtn === null || blogCloseBtn === void 0 ? void 0 : blogCloseBtn.addEventListener('click', function () {
  blogSidebar.classList.remove('show');
});
/******/ })()
;