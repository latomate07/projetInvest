/**** Show and hidden in Dashboard */
const firstStep = document.querySelector('.firstStep'),
      secondStep = document.querySelector('.secondStep'),
      thirdStep = document.querySelector('.thirdStep'),
      fourStep = document.querySelector('.fourStep'),

      /** Class Active */
      activeStepOne = document.querySelector('.stepOne'),
      activeStepTwo = document.querySelector('.stepTwo'),
      activeStepThree = document.querySelector('.stepThree'),
      activeStepFour = document.querySelector('.stepFour'),

      /* Block à afficher */
      stepOne = document.getElementById('step-1'),
      stepTwo = document.getElementById('step-2'),
      stepThree = document.getElementById('step-3'),
      stepFour = document.getElementById('step-4');

firstStep.addEventListener('click', () => {
    stepOne.style.display = "block";

    /* Hidden Others block */
    stepFour.style.display = "none";
    stepTwo.style.display = "none";
    stepThree.style.display = "none";
})
secondStep.addEventListener('click', () => {
    stepTwo.style.display = "block";
    
    /* Hidden Others block */
    stepFour.style.display = "none";
    stepOne.style.display = "none";
    stepThree.style.display = "none";
})
thirdStep.addEventListener('click', () => {
    stepThree.style.display = "block";

    /* Hidden Others block */
    stepFour.style.display = "none";
    stepTwo.style.display = "none";
    stepOne.style.display = "none";
})
fourStep.addEventListener('click', () => {
    stepFour.style.display = "block";

    /* Hidden Others block */
    stepOne.style.display = "none";
    stepTwo.style.display = "none";
    stepThree.style.display = "none";
})

/*** End */

