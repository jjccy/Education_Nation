function modChatModule() {
    var caret = document.getElementById("chat-module-caret");
    var chat_content = document.getElementById("chat-content");

    caret.classList.toggle("icon-caret-flip");

    if (chat_content.classList.length > 0 && chat_content.classList[0] == "module-body-hide") {
        chat_content.classList.remove("module-body-hide");
        chat_content.classList.add("module-body");
    } else {
        chat_content.classList.remove("module-body");
        chat_content.classList.add("module-body-hide");
    }
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
        console.log("chat module is open already!");
    }
}

if (document.getElementById("chat-header") != null) {
    document.getElementById("chat-header").addEventListener("click", modChatModule);
}