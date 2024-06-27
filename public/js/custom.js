var ww = $(window).width();
$(function () {
    if (ww < 992) {
        $("body").addClass("mobile-menu enable-vertical-menu");
        $(".navbar").addClass("z-3");
        var body = $("body");
        var menuOverlay = $(".menu-overlay");

        $(".vertical-menu-mobile-btn").click(function () {
            if (body.hasClass("open")) {
                body.removeClass("open");
                menuOverlay.removeClass("open");
            } else {
                body.addClass("open");
                menuOverlay.addClass("open");
            }
        });

        $(".menu-overlay").on("click", function () {
            if (menuOverlay.hasClass("open")) {
                menuOverlay.removeClass("open");
                $("body").removeClass("open");
            } else {
                body.addClass("open");
                menuOverlay.addClass("open");
            }
        });

        var verticalMenu = $("#primary-menu");
        if (verticalMenu.hasClass("open")) {
            verticalMenu.removeClass("open");
        } else {
            verticalMenu.addClass("open");
        }
    } else {
    }

    $.contextMenu({
        selector: '.table.table-contextmenu tbody tr',
        callback: function (key, options) {
            console.log("ok");
        },
        items: {
            "view": { name: "View Record" },
            "edit": { name: "Edit Record" },
        }
    });
    $(".table.table-contextmenu tbody tr").on("contextmenu", function(event) {
        event.preventDefault();
        $(".table.table-contextmenu tbody tr.custom-selected-row").removeClass("custom-selected-row");
        $(this).addClass("custom-selected-row");
    });
    $(".table.table-contextmenu tbody").on('click', 'tr', function() {
        $(".table.table-contextmenu tbody tr.custom-selected-row").removeClass("custom-selected-row");
        $(this).addClass("custom-selected-row");
    });

    $('#skusTabsContainer button[data-bs-toggle="tab"]').click(function () {
        if ($(".table.table-contextmenu tbody tr").hasClass('custom-selected-row')) {
            $(".table.table-contextmenu tbody tr").removeClass('custom-selected-row');
        }
    });

});


var largeWidth = $(window).width();
$(function () {
    if (largeWidth > 992) {
        $(".sidebar-toggle").click(function () {
            $("body").toggleClass("collapsed-menu");
            if ($(".sidebar-toggle").hasClass("icon-outline-arrow-left-2")) {
                $(".sidebar-toggle").removeClass("icon-outline-arrow-left-2")($(".sidebar-toggle").addClass("icon-outline-arrow-right-3"));
            } else {
                $(".sidebar-toggle").addClass("icon-outline-arrow-left-2")($(".sidebar-toggle").removeClass("icon-outline-arrow-right-3"));
            }
        });
        $(".navbar-toggle").click(function () {
            if ($(".navbar-toggle").hasClass("icon-outline-arrow-up-2")) {
                $(".navbar-toggle").removeClass("icon-outline-arrow-up-2")($(".navbar-toggle").addClass("icon-outline-arrow-down-1"));
            } else {
                $(".navbar-toggle").addClass("icon-outline-arrow-up-2")($(".navbar-toggle").removeClass("icon-outline-arrow-down-1"));
            }
        });
        $(".dropdown-hover").hover(
            function () {
                $(this).find(".dropdown-menu-hover").stop(true, true).delay(100).fadeIn(200);
            },
            function () {
                $(this).find(".dropdown-menu-hover").stop(true, true).delay(100).fadeOut(200);
            }
        );
        
    }
});

$(document).ready(function () {

    $(".form-multi-select").multiselect({
        autoReset: true,
        noneSelectedText: "Select a Manufacturer",
    },).multiselectfilter({
        label: "",
        autoReset: true,
    });
    $(".form-multi-select1").multiselect({
        autoReset: true,
        noneSelectedText: "Select a Business Unit  Management",
    },).multiselectfilter({
        label: "",
        autoReset: true,
    });
    $(".form-multi-select2").multiselect({
        autoReset: true,
        noneSelectedText: "Select a Catergory",
    },).multiselectfilter({
        label: "",
        autoReset: true,
    });
    
    $(".form-single-select").multiselect({
        autoReset: true,
        noneSelectedText: "Select an Option",
    },).multiselectfilter({
        label: "",
        autoReset: true,
    });

    //Show hide sub menu
    $('#showhidebtn').click(function () {
        $('.showonClick').toggleClass('show-all-items');
        if ($('#showhidebtn2').hasClass('icon-outline-arrow-down-1')) {
            $('#showhidebtn').html('Hide All <i class="icon-outline-arrow-up-2" id="showhidebtn2"></i>');
        }
        else{
            $('#showhidebtn').html('Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i>');
        }
    });

});

// var navbarHeight = $(".topNavbar").height();
// $(function(){
//     console.log(navbarHeight);
//     $(".main-content").css("paddingTop", navbarHeight+"px");

// });
// Get the checkbox element and body element
// var navbarHeight2 = $(".topNavbar").height();
const checkbox = document.getElementById('enable-vertical-menu');
const body = document.body;
const verticalMenu = document.getElementById('primary-menu');
const navbarSupportedContent = document.getElementById('navbarSupportedContent');

// Add an event listener to the checkbox
// checkbox.addEventListener('change', function () {
//     if (checkbox.checked) {
//         body.classList.add('enable-vertical-menu');
//         $("#primary-menu > .dropdown").addClass("dropend").removeClass("dropdown")
//         verticalMenu.classList.remove('flex-lg-row');
//         navbarSupportedContent.classList.add('show');
//         $(".customHeightDropDown").removeClass("mt-2")
//     } else if (!checkbox.checked) {
//         console.log("ok");
//         body.classList.remove('enable-vertical-menu');
//         $("#primary-menu > .dropend").addClass("dropdown").removeClass("dropend")
//         verticalMenu.classList.add('flex-lg-row');
//         $(".customHeightDropDown").addClass("mt-2")
//     }
//     else {
//         body.classList.remove('enable-vertical-menu');
//         $("#primary-menu > .dropend").addClass("dropdown").removeClass("dropend")
//         verticalMenu.classList.add('flex-lg-row');
//         $(".customHeightDropDown").addClass("mt-2")
//     }
// });

$("#primary-menu .nav-item").click(function () {
    if ($("body").hasClass("enable-vertical-menu")) {
        window.scrollTo({
            top: 0,
            behavior: "instant",
        });
    }
})
$("body").mouseover(function () {
    if ($("body").hasClass("enable-vertical-menu")) {
        if ($(".dropdown-menu").hasClass("show")) {
            $("body").css("overflow", "hidden")
        }
        else {
            $("body").css("overflow", "auto")
        }
    }
})

document.addEventListener('DOMContentLoaded', function() {
    
    const checkbox = document.getElementById('enable-vertical-menu');
    const body = document.body;
    
    // if (checkbox.checked) {
        body.classList.add('enable-vertical-menu');
        verticalMenu.classList.remove('flex-lg-row');
        verticalMenu.classList.add('flex-column');
    // // } else {
    //     body.classList.remove('enable-vertical-menu');
    //     verticalMenu.classList.remove('flex-column');
    //     verticalMenu.classList.add('flex-lg-row');
    // }
});


// CODE FOR PROGRESS BAR
window.addEventListener("DOMContentLoaded", () => {
    new UploadModal("#upload");
    new UploadModal2("#upload2");
    new UploadModal3("#upload3");
});
class UploadModal {
    filename = "";
    isUploading = false;
    progress = 0;
    progressTimeout = null;
    state = 0;

    constructor(el) {
        this.el = document.querySelector(el);
        this.el?.addEventListener("click", this.action.bind(this));
        this.el?.querySelector("#file")?.addEventListener("change", this.fileHandle.bind(this));
    }
    action(e) {
        this[e.target?.getAttribute("data-action")]?.();
        this.stateDisplay();
    }
    cancel() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 0;
        this.stateDisplay();
        this.progressDisplay();
        this.fileReset();
        ($("#saveFileButton").removeClass("displayInline"));
    }
    fail() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 2;
        this.stateDisplay();
    }
    file() {
        this.el?.querySelector("#file").click();
    }
    fileDisplay(name = "") {
        // update the name
        this.filename = name;

        const fileValue = this.el?.querySelector("[data-file]");
        if (fileValue) fileValue.textContent = this.filename;

        // show the file
        this.el?.setAttribute("data-ready", this.filename ? "true" : "false");
    }
    fileHandle(e) {
        return new Promise(() => {
            const { target } = e;
            if (target?.files.length) {
                let reader = new FileReader();
                reader.onload = e2 => {
                    this.fileDisplay(target.files[0].name);
                };
                reader.readAsDataURL(target.files[0]);
            }
        });
    }
    fileReset() {
        const fileField = this.el?.querySelector("#file");
        if (fileField) fileField.value = null;

        this.fileDisplay();
    }
    progressDisplay() {
        const progressValue = this.el?.querySelector("[data-progress-value]");
        const progressFill = this.el?.querySelector("[data-progress-fill]");
        const progressTimes100 = Math.floor(this.progress * 100);

        if (progressValue) progressValue.textContent = `${progressTimes100}%`;
        if (progressFill) progressFill.style.transform = `translateX(${progressTimes100}%)`;
    }
    async progressLoop() {
        this.progressDisplay();

        if (this.isUploading) {
            if (this.progress === 0) {
                await new Promise(res => setTimeout(res, 1000));
                // fail randomly
                if (!this.isUploading) {
                    return;
                } else if (Utils.randomInt(0, 2) === 0) {
                    this.fail();
                    return;
                }
            }
            // …or continue with progress
            if (this.progress < 1) {
                this.progress += 0.01;
                this.progressTimeout = setTimeout(this.progressLoop.bind(this), 50);
            } else if (this.progress >= 1) {
                this.progressTimeout = setTimeout(() => {
                    if (this.isUploading) {
                        this.success();
                        this.stateDisplay();
                        this.progressTimeout = null;
                    }
                }, 250);
            }
        }
    }
    stateDisplay() {
        this.el?.setAttribute("data-state", `${this.state}`);
    }
    success() {
        this.isUploading = false;
        this.state = 3;
        this.stateDisplay();
        var n = this.filename
        document.getElementById("fileName").innerHTML = n;
        ($("#saveFileButton").addClass("displayInline"));
    }
    upload() {
        if (!this.isUploading) {
            this.isUploading = true;
            this.progress = 0;
            this.state = 1;
            this.progressLoop();
        }
    }
}
class UploadModal2 {
    filename = "";
    isUploading = false;
    progress = 0;
    progressTimeout = null;
    state = 0;

    constructor(el) {
        this.el = document.querySelector(el);
        this.el?.addEventListener("click", this.action.bind(this));
        this.el?.querySelector("#file2")?.addEventListener("change", this.fileHandle.bind(this));
    }
    action(e) {
        this[e.target?.getAttribute("data-action")]?.();
        this.stateDisplay();
    }
    cancel() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 0;
        this.stateDisplay();
        this.progressDisplay();
        this.fileReset();
        ($("#saveFileButton2").removeClass("displayInline"));
    }
    fail() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 2;
        this.stateDisplay();
    }
    file() {
        this.el?.querySelector("#file2").click();
    }
    fileDisplay(name = "") {
        // update the name
        this.filename = name;

        const fileValue = this.el?.querySelector("[data-file]");
        if (fileValue) fileValue.textContent = this.filename;

        // show the file
        this.el?.setAttribute("data-ready", this.filename ? "true" : "false");
    }
    fileHandle(e) {
        return new Promise(() => {
            const { target } = e;
            if (target?.files.length) {
                let reader = new FileReader();
                reader.onload = e2 => {
                    this.fileDisplay(target.files[0].name);
                };
                reader.readAsDataURL(target.files[0]);
            }
        });
    }
    fileReset() {
        const fileField = this.el?.querySelector("#file2");
        if (fileField) fileField.value = null;

        this.fileDisplay();
    }
    progressDisplay() {
        const progressValue = this.el?.querySelector("[data-progress-value]");
        const progressFill = this.el?.querySelector("[data-progress-fill]");
        const progressTimes100 = Math.floor(this.progress * 100);

        if (progressValue) progressValue.textContent = `${progressTimes100}%`;
        if (progressFill) progressFill.style.transform = `translateX(${progressTimes100}%)`;
    }
    async progressLoop() {
        this.progressDisplay();

        if (this.isUploading) {
            if (this.progress === 0) {
                await new Promise(res => setTimeout(res, 1000));
                // fail randomly
                if (!this.isUploading) {
                    return;
                } else if (Utils.randomInt(0, 2) === 0) {
                    this.fail();
                    return;
                }
            }
            // …or continue with progress
            if (this.progress < 1) {
                this.progress += 0.01;
                this.progressTimeout = setTimeout(this.progressLoop.bind(this), 50);
            } else if (this.progress >= 1) {
                this.progressTimeout = setTimeout(() => {
                    if (this.isUploading) {
                        this.success();
                        this.stateDisplay();
                        this.progressTimeout = null;
                    }
                }, 250);
            }
        }
    }
    stateDisplay() {
        this.el?.setAttribute("data-state", `${this.state}`);
    }
    success() {
        this.isUploading = false;
        this.state = 3;
        this.stateDisplay();
        var n = this.filename
        document.getElementById("fileName2").innerHTML = n;
        ($("#saveFileButton2").addClass("displayInline"));
    }
    upload() {
        if (!this.isUploading) {
            this.isUploading = true;
            this.progress = 0;
            this.state = 1;
            this.progressLoop();
        }
    }
}

class UploadModal3 {
    filename = "";
    isUploading = false;
    progress = 0;
    progressTimeout = null;
    state = 0;

    constructor(el) {
        this.el = document.querySelector(el);
        this.el?.addEventListener("click", this.action.bind(this));
        this.el?.querySelector("#file3")?.addEventListener("change", this.fileHandle.bind(this));
    }
    action(e) {
        this[e.target?.getAttribute("data-action")]?.();
        this.stateDisplay();
    }
    cancel() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 0;
        this.stateDisplay();
        this.progressDisplay();
        this.fileReset();
        ($("#saveFileButton3").removeClass("displayInline"));
    }
    fail() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 2;
        this.stateDisplay();
    }
    file() {
        this.el?.querySelector("#file3").click();
    }
    fileDisplay(name = "") {
        // update the name
        this.filename = name;

        const fileValue = this.el?.querySelector("[data-file]");
        if (fileValue) fileValue.textContent = this.filename;

        // show the file
        this.el?.setAttribute("data-ready", this.filename ? "true" : "false");
    }
    fileHandle(e) {
        return new Promise(() => {
            const { target } = e;
            if (target?.files.length) {
                let reader = new FileReader();
                reader.onload = e2 => {
                    this.fileDisplay(target.files[0].name);
                };
                reader.readAsDataURL(target.files[0]);
            }
        });
    }
    fileReset() {
        const fileField = this.el?.querySelector("#file3");
        if (fileField) fileField.value = null;

        this.fileDisplay();
    }
    progressDisplay() {
        const progressValue = this.el?.querySelector("[data-progress-value]");
        const progressFill = this.el?.querySelector("[data-progress-fill]");
        const progressTimes100 = Math.floor(this.progress * 100);

        if (progressValue) progressValue.textContent = `${progressTimes100}%`;
        if (progressFill) progressFill.style.transform = `translateX(${progressTimes100}%)`;
    }
    async progressLoop() {
        this.progressDisplay();

        if (this.isUploading) {
            if (this.progress === 0) {
                await new Promise(res => setTimeout(res, 1000));
                // fail randomly
                if (!this.isUploading) {
                    return;
                } else if (Utils.randomInt(0, 2) === 0) {
                    this.fail();
                    return;
                }
            }
            // …or continue with progress
            if (this.progress < 1) {
                this.progress += 0.01;
                this.progressTimeout = setTimeout(this.progressLoop.bind(this), 50);
            } else if (this.progress >= 1) {
                this.progressTimeout = setTimeout(() => {
                    if (this.isUploading) {
                        this.success();
                        this.stateDisplay();
                        this.progressTimeout = null;
                    }
                }, 250);
            }
        }
    }
    stateDisplay() {
        this.el?.setAttribute("data-state", `${this.state}`);
    }
    success() {
        this.isUploading = false;
        this.state = 3;
        this.stateDisplay();
        var n = this.filename
        document.getElementById("fileName2").innerHTML = n;
        ($("#saveFileButton3").addClass("displayInline"));
    }
    upload() {
        if (!this.isUploading) {
            this.isUploading = true;
            this.progress = 0;
            this.state = 1;
            this.progressLoop();
        }
    }
}
class Utils {
    static randomInt(min = 0, max = 2 ** 32) {
        const percent = crypto.getRandomValues(new Uint32Array(1))[0] / 2 ** 32;
        const relativeValue = (max - min) * percent;

        return Math.round(min + relativeValue);
    }
}

// CODE FOR EXPANDING TOGGLE ON DROP DOWN SELECT UPDATE DATA
$(".custom-width-modal").click(function () {
    // $(".changeIconDirection").html(' Please Select Master SKU Info');
})

$(".custom-width-modal .distributorSKUCode").click(function () {
    $(".Update").removeClass("d-none");
    $(".modal-content>.btn").hide();
    $(".custom-width-modal .modal-dialog>div").css("width", "auto");
    $(".custom-width-modal .modal-dialog>div").addClass("overflow-y-auto");
    $(".custom-width-modal .modal-dialog").addClass("modal-dialog-scrollable");
})

$(".custom-width-modal .closeDistributorSKU").click(function () {
    $(".Update").addClass("d-none");
    $(".modal-content>.btn").show();
    $(".custom-width-modal .modal-dialog>div").css("width", "400px");
    $(".custom-width-modal .modal-dialog>div").removeClass("overflow-y-auto");
    $(".custom-width-modal .modal-dialog").removeClass("modal-dialog-scrollable");
})

// CODE FOR TOGGLE ARROW POSITION FOR DROPDOWN (GENERAL CODE FOR EVERY DROP DOWN)
$(".changeIconDirection").click(function () {
    if ($(".customUpdateDropDnBtn").hasClass("show")) {
        ($(".iconToggle").removeClass("icon-outline-arrow-down-1"));
            ($(".iconToggle").addClass("icon-outline-arrow-up-2"));
    } else {
        $(".iconToggle").addClass("icon-outline-arrow-down-1")
            ($(".iconToggle").removeClass("icon-outline-arrow-up-2"));
    }
});

// CODE FOR CHANGING TEXT ON SELECT DROP DOWN (GENERAL CODE FOR EVERY DROP DOWN)
$(".customUpdateDropDnBtn li a").click(function () {
    $(".changeIconDirection").html('Dsitributor SKU Code <i class="icon-outline-arrow-down-1 float-end text-primary ms-3 customFontSize-17px iconToggle"></i>');
    // if ($(".customUpdateDropDnBtn").hasClass("show")) {
    //     $(".iconToggle").removeClass("icon-outline-arrow-down-1")
    //         ($(".iconToggle").addClass("icon-outline-arrow-up-2"));
    // } else {
    //     $(".iconToggle").addClass("icon-outline-arrow-down-1")
    //         ($(".iconToggle").removeClass("icon-outline-arrow-up-2"));
    // }








    


});

