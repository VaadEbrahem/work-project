
function imgSlider(anyhing){
    /*استدعيت عنصر الصورة يلي لما اكبس عليه راح  يغير  الى صورة الثانيي */
    document.querySelector(".content_imgBox_starbucks").src = anyhing;
};

function changeCircleColor(color){
    let Circle=document.querySelector(".section_circle");
    Circle.style.background = color;
}


