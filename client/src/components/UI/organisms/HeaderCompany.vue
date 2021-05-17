<template>
  <header id='navbar'>
    <nav class='navbar-container container'>
      <a href='/companies' class='home-link'>
        Stage Tool
      </a>
      <button type='button' class='navbar-toggle' aria-label='Open navigation menu'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <div class='navbar-menu'>
        <ul class='navbar-links'>
          <li class='navbar-item'><a class='navbar-link' href='/companies'>Overzicht</a></li>
          <li class='navbar-item'><a class='navbar-link' href='/companies/proposals'>Mijn voorstellen</a></li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'HeaderCompany',
  mounted () {
    const navbar = document.getElementById('navbar')
    const navbarToggle = navbar.querySelector('.navbar-toggle')

    function openMobileNavbar () {
      navbar.classList.add('opened')
      navbarToggle.setAttribute('aria-label', 'Close navigation menu.')
    }
    function closeMobileNavbar () {
      navbar.classList.remove('opened')
      navbarToggle.setAttribute('aria-label', 'Open navigation menu.')
    }
    navbarToggle.addEventListener('click', () => { if (navbar.classList.contains('opened')) { closeMobileNavbar() } else { openMobileNavbar() } })
    const navbarMenu = navbar.querySelector('.navbar-menu')
    const navbarLinksContainer = navbar.querySelector('.navbar-links')
    navbarLinksContainer.addEventListener('click', (clickEvent) => { clickEvent.stopPropagation() })
    navbarMenu.addEventListener('click', closeMobileNavbar)
  }
}
</script>

<style scoped>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  height: 100vh;
  font-family: Arial, Helvetica, sans-serif;
  line-height: 1.6;
}

.container {
  max-width: 1000px;
  padding-left: 1.4rem;
  padding-right: 1.4rem;
  margin-left: auto;
  margin-right: auto;
}

#navbar {
  --navbar-height: 64px;
  position: fixed;
  height: var(--navbar-height);
  background-color: white;
  left: 0;
  right: 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  height: 100%;
  align-items: center;
}

.navbar-item {
  margin: 0.4em;
  width: 100%;
}

.home-link, .navbar-link {
  color: #111;
  text-decoration: none;
  display: flex;
  font-weight: 400;
  align-items: center;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.home-link:focus, .home-link:hover,
.navbar-link:focus, .navbar-link:hover {
  color: #1A7EF2;
}

.home-link {
  font-size: 1.5rem;
  font-weight: bold;
}

.navbar-link {
  justify-content: center;
  width: max-content;
  padding: 0.5em 0.8em;
  border-radius: 5px;
}

.navbar-toggle {
  cursor: pointer;
  border: none;
  background-color: transparent;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.icon-bar {
  display: block;
  width: 25px;
  height: 4px;
  margin: 2px;
  transition: white 0.2s ease-in-out,
  transform 0.2s ease-in-out,
  opacity 0.2s ease-in-out;
  background-color: #111;
}

#navbar.opened .navbar-toggle .icon-bar:first-child,
#navbar.opened .navbar-toggle .icon-bar:last-child {
  position: absolute;
  margin: 0;
  width: 30px;
}

#navbar.opened .navbar-toggle .icon-bar:first-child {
  transform: rotate(45deg);
}

#navbar.opened .navbar-toggle .icon-bar:nth-child(2) {
  opacity: 0;
}

#navbar.opened .navbar-toggle .icon-bar:last-child {
  transform: rotate(-45deg);
}

.navbar-menu {
  position: fixed;
  top: var(--navbar-height);
  bottom: 0;
  transition: opacity 0.2s ease-in-out,
  visibility 0.2s ease-in-out;
  opacity: 0;
  visibility: hidden;
  left: 0;
  right: 0;
}

#navbar.opened .navbar-menu {
  opacity: 1;
  visibility: visible;
}

.navbar-links {
  list-style-type: none;
  max-height: 0;
  overflow: hidden;
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  left: 0;
  right: 0;
  margin: 1.4rem;
  border-radius: 5px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

#navbar.opened .navbar-links {
  padding: 1em;
  max-height: none;
  background-color: white;
}

@media screen and (min-width: 700px) {
  .navbar-toggle {
    display: none;
  }

  #navbar .navbar-menu,
  #navbar.opened .navbar-menu {
    visibility: visible;
    opacity: 1;
    position: static;
    display: block;
    height: 100%;
  }

  #navbar .navbar-links,
  #navbar.opened .navbar-links {
    margin: 0;
    padding: 0;
    box-shadow: none;
    position: static;
    flex-direction: row;
    list-style-type: none;
    max-height: max-content;
    width: 100%;
    height: 100%;
  }
}
</style>
