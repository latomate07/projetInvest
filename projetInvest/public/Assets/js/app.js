
function showAfterClick (parent, child) {
    const parentBlock = document.querySelector(parent),
          child_Block = document.querySelector(child);

    parentBlock.addEventListener('click', () => {
        child_Block.style.opacity="1";
        child_Block.style.visibility="visible";
    })
}