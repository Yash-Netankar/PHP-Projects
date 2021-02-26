const submenu_of_file = document.querySelector(".submenu");
const f_size_select = document.getElementById("select_size");
const textarea = document.getElementById("textarea");
const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");
const form3 = document.getElementById("form3");
const saveModal = document.querySelector(".save-as-modal");
const saveAs = document.querySelector(".saveAs");
const save = document.querySelector(".save-as-modal .save");
const close_btn = document.querySelector(".close-modal");


// getting fontsize and assigning it to textarea content
function FontSize(){
    let value = f_size_select.value;
    textarea.style.fontSize = value + "rem";
}

function disp() {
    var t = textarea.value.substr(textarea.selectionStart, textarea.selectionEnd - textarea.selectionStart);
    if(t!=="") console.log(t)
    t=""
}
// sending data to textarea on pressing alt + c
// sending data to php to save in file on pressing alt + s
document.addEventListener("keydown", (e)=>{
    if(e.altKey && e.key == "c"){
        console.log("alt + c")
        form1.submit();
        form1.addEventListener("submit", (e)=>{
            e.preventDefault();
        });
    }   
    if(e.altKey && e.key == "s"){
        console.log("alt + s")
        form2.submit() ;
        form2.addEventListener("submit", (e)=>{
          e.preventDefault();
        });
    }
});


// handling save as modal
saveAs.addEventListener("click", ()=>{
    saveModal.classList.add("show");
});
save.addEventListener("click", ()=>{
    saveModal.style.transform = "scale(0)";
});
close_btn.addEventListener("click", ()=>{
    saveModal.classList.remove("show");
});

//creating cookie on submit form3 to get value inside textarea in php file(index3)

form3.addEventListener("submit", ()=>{
    text_value = textarea.value;
    document.cookie = `textarea_value = ${text_value}`;
});



//Exec commands
function func(command){
    let value2 = textarea.value;
    if(command== "bold"){
        console.log(value2)
        for (var i = 0; i < value2.length; i++) {
            value2[i].style.fontSize=20+"px";
        }
    }
}