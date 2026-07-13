const darkSwitchIcon = document.querySelector("#dark-switch-icon");
const darkSwitch = document.querySelector("#dark-switch")
const darkText = document.querySelector("#dark-text")
const darkChangeText = document.querySelector("#dark-text-change")
const lh = document.querySelector('.lh');
const dk = document.querySelector('.dk');
const waveSVG2 = document.querySelector('#wave-svg2');
const wave = document.getElementById('wave');
const wave2 = document.querySelector('.wave2');
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
    wave.style.removeProperty("fill")
    wave.style.setProperty("fill", "#334155")

    waveSVG2.style.removeProperty("fill")
    waveSVG2.style.setProperty("fill", "#334155")
    localStorage.setItem('cu-data-theme', 'dark')
    html.classList.add('dark')
}

const toLight = () => {
    darkSwitchIcon.classList.remove('bg-slate-900')
    lh.classList.add('hidden')
    dk.classList.remove('hidden')
    waveSVG2.style.removeProperty("fill")
    waveSVG2.style.setProperty("fill", "#94a3b8")
    wave.style.removeProperty("fill")
    wave.style.setProperty("fill", "#f1f5f9")

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
