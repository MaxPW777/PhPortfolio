const dialog = document.querySelector("dialog");
const showButton = document.querySelector("dialog + button");
const closeButton = document.querySelector("dialog button");

function openDialog(dialogId) {
    document.getElementById(dialogId).showModal();
}

function closeDialog(dialogId) {
    document

.getElementById(dialogId).close();
}
