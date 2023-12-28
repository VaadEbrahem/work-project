let ContainerToDoİtem = document.querySelector(".container_to-do-item");
let ContainerNavUserİnput = document.getElementById("container_nav_user_input");
/*من وين جيت */
let trashIcon = document.getElementById("trash")

ContainerNavUserİnput.addEventListener("keydown" , function (event) {
    if(event.key === "Enter") {addItem();}
})
function  addItem(){
    let divParent = document.createElement("div");
    /* لنو عندي اكثر من 3 عناصر داخل المتطيل لهيك راح اضيف ديف الاخ  */
    let divChild = document.createElement("div");
      /*اضيف ايقونة الصح */
    let checkIcon = document.createElement("i");
   
           /*اضيف ايقونة الزبالي */
    let trashIcon = document.createElement("i");

/*نعطيه قيمة الكلاس */
 divParent.className ="İtem";
/* المحتوة ديف يلي راح ياخذ الوامر يلي بل سي اس اس  */
divParent.innerHTML= '<div>' + ContainerNavUserİnput.value + '</div>';
/*الصح  */
checkIcon.className = "ri-chat-check-line";
checkIcon.style.color = "lightgray";
checkIcon.addEventListener("click" , function(){
    checkIcon.style.color = "limegreen";
})
/*ضفنا العنصر داخل الديف */
divChild.appendChild(checkIcon); 


trashIcon.className ="ri-delete-bin-5-line";
trashIcon.style.color = "darkgray";
trashIcon.addEventListener("click" , function(){
    divParent.remove();
})

/*ضفنا العنصر داخل الديف */
divChild.appendChild(trashIcon); 

/*الديف الاخ حطيتها بديف الاب */
divParent.appendChild(divChild);

/*ضيفلي ديف الاب داخل الزر  */
ContainerToDoİtem.appendChild(divParent);


ContainerNavUserİnput.value = '';
}
