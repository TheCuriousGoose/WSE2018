import './bootstrap';

document.addEventListener('DOMContentLoaded', async () => {
    const navItemsRoute = document.querySelector('[name="nav-items-route"]').getAttribute('content');
    const navItemsContainer = document.getElementById('nav-items-container');

    if(navItemsContainer){

        const response = await fetch(navItemsRoute);
        const navItems = await response.json();

        navItems.forEach(navItem => {
            let liElement = document.createElement('li');
            liElement.classList.add('nav-item');

            let aElement = document.createElement('a');
            aElement.href = navItem.link;
            aElement.innerHTML = navItem.name;
            aElement.classList.add('nav-link');

            liElement.appendChild(aElement);

            navItemsContainer.appendChild(liElement);
        })
    }
});
