const darkSwitchIcon = document.querySelector("#dark-switch-icon");
const darkSwitch = document.querySelector("#dark-switch")
const darkText = document.querySelector("#dark-text")
const darkChangeText = document.querySelector("#dark-text-change")
const lh = document.querySelector('.lh');
const dk = document.querySelector('.dk');
const home = document.querySelector(".home");
const html = document.documentElement;
let isDarkMode = false;

// Switch theme function
const toggleTheme = () => {
    isDarkMode = !isDarkMode;
    switchTheme()
}

const toDark = () => {
    darkSwitchIcon.classList.remove('bg-slate-900')
    lh.classList.remove('hidden')
    dk.classList.add('hidden')

    localStorage.setItem('cu-data-theme', 'dark')
    html.classList.add('dark')
}

const toLight = () => {
    darkSwitchIcon.classList.remove('bg-slate-900')
    lh.classList.add('hidden')
    dk.classList.remove('hidden')
    localStorage.removeItem('cu-data-theme')
    html.classList.remove('dark')
    setTimeout(() => {
        darkSwitchIcon.classList.remove('rotate-[360deg]')
    }, 200)
}
const switchTheme = () => {
    isDarkMode ? toDark() : toLight()
        // or
        // if (isDarkMode) {
        //     toDark()
        // } else {
        //     toLight()
        // }
}


// If you do reload the webpage,
// doesn't change you choose theme.
// This `dataTheme` function save permentaly choose theme.

const dataTheme = localStorage.getItem('cu-data-theme')

dataTheme === 'dark' ? toDark() : toLight();
// or
// if(dataTheme === 'dark') {
//     toDark()
// } else {
//     toLight()
// }
