// slide container & slides
const slides = document.querySelector(".slides");//ul
const slide = Array.from(slides.children);//all slides

// neXt prev btns
const prev_btn = document.querySelector(".left-btn");
const next_btn = document.querySelector(".right-btn");

// indicators
const slide_indicator_div = document.querySelector(".slide-nav");
const slide_indicator = Array.from(slide_indicator_div.children);

// slide width
const slideWidth = slide[0].getBoundingClientRect().width;

// ARRANGE slides next to each other but not stacking
slide.forEach((slide, index) => {
    slide.style.left = slideWidth*index + "px";
});

// MOVING SLIDES
// function to change slides onclick
const changeSlide = (slides, current_slide, target_slide) =>{
    slides.style.transform = `translateX(-${target_slide.style.left})`;
    current_slide.classList.remove("curr-slide");
    target_slide.classList.add("curr-slide");
}

//update dots
const updateDots = (current_indicator, targetIndicator)=>{
    current_indicator.classList.remove("curr-slide");
    targetIndicator.classList.add("curr-slide");
}

//hide show arrow
document.addEventListener("load", ()=>{
    prev_btn.classList.add("hide-btn");
})
const hideshowArrow = (slide, prev_btn, next_btn, targetIndex)=>{
    
    if(targetIndex===0){
        prev_btn.classList.add('hide-btn');
        next_btn.classList.remove('hide-btn');
    }
    else if(targetIndex=== slide.length - 1){
        prev_btn.classList.remove('hide-btn');
        next_btn.classList.add('hide-btn');
    }
    else{
        prev_btn.classList.remove('hide-btn');
        next_btn.classList.remove('hide-btn');
    }
}

// WHEN clicked on right button
next_btn.addEventListener("click", ()=>{
    const current_slide = slides.querySelector('.curr-slide');
    const next_slide = current_slide.nextElementSibling;
   
    changeSlide(slides, current_slide, next_slide);

    const current_indicator = slide_indicator_div.querySelector(".curr-slide");
    const next_indicator = current_indicator.nextElementSibling;
    updateDots(current_indicator, next_indicator);

    const next_Index = slide.findIndex(slide => slide == next_slide);
    hideshowArrow(slide, prev_btn, next_btn, next_Index);
});

// WHEN clicked on left button
prev_btn.addEventListener("click", ()=>{
    let current_slide = slides.querySelector('.curr-slide');
    let prev_slide = current_slide.previousElementSibling;

    changeSlide(slides, current_slide, prev_slide);

    const current_indicator = slide_indicator_div.querySelector(".curr-slide");
    const prev_indicator = current_indicator.previousElementSibling;
    updateDots(current_indicator, prev_indicator);

    const prev_Index = slide.findIndex(slide => slide == prev_slide);
    hideshowArrow(slide, prev_btn, next_btn, prev_Index);
});


// change as clicked on dots
slide_indicator_div.addEventListener("click", e=>{
    const targetIndicator = e.target.closest('button');

    if(!targetIndicator) return;

    const current_slide = slides.querySelector('.curr-slide');
    const current_indicator = slide_indicator_div.querySelector(".curr-slide");

    const targetIndex = slide_indicator.findIndex(dot => dot === targetIndicator);

    const target_slide = slide[targetIndex];

    changeSlide(slides, current_slide, target_slide);
    updateDots(current_indicator, targetIndicator);

    hideshowArrow(slide, prev_btn, next_btn, targetIndex);

})