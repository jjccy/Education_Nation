function modChatModule() {
    var caret = document.getElementById("chat-module-caret");
    var chat_content = document.getElementById("chat-content");

    caret.classList.toggle("icon-caret-flip");

    if (chat_content.classList.length > 0 && chat_content.classList[0] == "module-body-hide") {
        console.log("module open");
        chat_content.classList.remove("module-body-hide");
        chat_content.classList.add("module-body");
    } else {
        console.log("module closed");
        chat_content.classList.remove("module-body");
        chat_content.classList.add("module-body-hide");
    }

    updateFrame();
}

function chatModuleUp() {
    var iframe = document.getElementById("iframeHelp");
    var caret = iframe.contentWindow.document.getElementById("chat-module-caret");
    var chat_content = iframe.contentWindow.document.getElementById("chat-content");

    if (caret.classList[1] == "icon-caret-flip" && chat_content.classList[0] == "module-body-hide") {
        caret.classList.add("icon-caret-flip");
        chat_content.classList.remove("module-body-hide");
        chat_content.classList.add("module-body");
    } else {
        // console.log("chat module is open already!");
    }
}

// to set iFrame height and width onload
function setFrame() {
    var iframe = document.getElementById("iframeHelp");
    var helpModule = iframe.contentWindow.document.getElementById("help-module");
    iframe.style.height = helpModule.offsetHeight + "px";
    iframe.style.width = helpModule.offsetWidth + "px";

    // console.log("setFrame ran");
}

// update iFrame height and width when clicked on
function updateFrame() {
    var iframe = parent.document.getElementById("iframeHelp");
    var helpModule = iframe.contentWindow.document.getElementById("help-module");
    // console.log("running updateframeHeight");

    var newHeight = helpModule.offsetHeight + "px";
    var newWidth = helpModule.offsetWidth + "px";
    iframe.style.height = newHeight;
    iframe.style.width = newWidth;
}

if (document.getElementById("chat-header") != null) {
    document.getElementById("chat-header").addEventListener("click", modChatModule);
}

if (document.getElementById("iframeHelp") != null) {
    document.getElementById("iframeHelp").addEventListener("load", setFrame);
    // console.log("loading setframe");
}