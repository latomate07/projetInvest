/**** FUNCTIONS *******/
function show(parent, child) { // Show with Toggle visibility
    parent.addEventListener('click', () => {
        child.classList.toggle('visible');
    })
}
function showBlock(parent, child) { // Show with Style display
    parent.addEventListener('click', () => {
        child.style.display = "block";
    })
}
function hideBlock(parent, child) { // Hide with Styledisplay
    parent.addEventListener('click', () => {
        child.style.display = "none";
    })
}

function showFromRight(parent, child) { // Show & ANimate avec une animation de droite à gauche
    parent.addEventListener('click', () => {
        child.classList.toggle('visible');
        child.classList.remove('invisible');
        child.classList.toggle('slide-left');
    })
}
function close(parent, child) {
    parent.addEventListener('click', () => {
        child.classList.remove('visible');
    })
}
function isEmpty(str) {
    return (!str || str.length === 0 );
}

/**** SHOW/HIDDEN ELEMENTS in Header*/
const viewMore = document.querySelector('.viewMore'),
      blockContent = document.querySelector('.block-content'),
      notifIcon = document.querySelector('.notifications'),
      notifBlock = document.querySelector('.notif-block'),
      closeBtn = document.querySelector('.close-btn');

show(viewMore, blockContent);
showFromRight(notifIcon, notifBlock);
showFromRight(closeBtn, notifBlock);
/*** End */

/**** Show notifications */

function showNotifications () {
    const xhr = new XMLHttpRequest();


    xhr.open("POST", "/ajax/ajax.php", true)
    xhr.responseType = "json";
    xhr.send();
}

// Afficher chaque 5 sécondes
setInterval(() => {
    showNotifications();
}, 5000);