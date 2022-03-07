//const = document.querySelector(".");
//const = document.querySelector(".");
const watchlisttxt = document.querySelector(".watchlistactive");
const watchlist = document.querySelector(".watchlist");
const notes =  document.querySelector(".notes");
const notestxt = document.querySelector(".notesinactive");
const add = document.querySelector(".add");
const addnote = document.querySelector(".addnotehidden");

function notestxtclicked(){
    notestxt.className = "notesactive";
    notes.className = "notesvisible";
    watchlisttxt.className = "watchlistinactive";
    watchlist.className = "watchlisthidden";
    add.className = "add";
}
function watchlistxtclicked(){
    watchlisttxt.className = "watchlistactive";
    watchlist.className = "watchlist";
    notestxt.className = "notesinactive";
    notes.className = "notes";
    add.className = "add";
}
function addtitle(){
    if (watchlisttxt.className == "watchlistactive" && watchlist.className == "watchlist") {
        add.title = "Add Stock";
    } else if(notestxt.className == "notesactive" && notes.className == "notesvisible"){
        add.title = "Add Note";
    } else{
        add.title = "cancel";
    }
}
function addbuttonclick(){
    if (watchlisttxt.className == "watchlistactive" && watchlist.className == "watchlist") {
        watchlist.className = "watchlisthidden";
    } else if(watchlisttxt.className == "watchlistactive" && watchlist.className == "watchlisthidden"){
        watchlist.className = "watchlist";
    } else if (notestxt.className == "notesactive" && notes.className == "notesvisible") {
        notes.className = "notes";
        addnote.className = "addnote";
    } else if(notestxt.className == "notesactive" && notes.className == "notes"){
        notes.className = "notesvisible";
        addnote.className = "addnotehidden"
    }

    if (add.className == "add") {
        add.className = "cancel";
    } else {
        add.className = "add";
    }
}
console.log("e^(-x^2-2y^2)");
notestxt.addEventListener("click", notestxtclicked);
watchlisttxt.addEventListener("click", watchlistxtclicked);
add.addEventListener("mouseover", addtitle);
add.addEventListener("click", addbuttonclick);