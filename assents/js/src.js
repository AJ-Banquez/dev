
const themeToggle = document.getElementById('theme-toggle');
const darkIcon = document.getElementById('theme-toggle-dark-icon');
const lightIcon = document.getElementById('theme-toggle-light-icon');

// Función para obtener el tema predeterminado del sistema
function getDefaultTheme() {
  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

// Función para aplicar el tema
function applyTheme(theme) {
  const body = document.body;
  if (theme === 'dark') {
    body.classList.add('dark');
    body.style.backgroundColor = '#1f2937'; // Color de fondo oscuro
    darkIcon.classList.remove('hidden');
    lightIcon.classList.add('hidden');
  } else {
    body.classList.remove('dark');
    body.style.backgroundColor = '#f3f4f6'; // Color de fondo claro
    darkIcon.classList.add('hidden');
    lightIcon.classList.remove('hidden');
  }
}

// Obtener el tema predeterminado y aplicarlo
//const defaultTheme = getDefaultTheme();
//applyTheme(defaultTheme);

// Cambiar el tema al hacer clic en el botón
themeToggle.addEventListener('click', function() {
  const currentTheme = document.body.classList.contains('dark') ? 'light' : 'dark';
  applyTheme(currentTheme);
  localStorage.setItem('theme', currentTheme);
});

// Aplicar el tema predeterminado cuando cambie en el sistema
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
  const systemTheme = event.matches ? 'dark' : 'light';
  applyTheme(systemTheme);
  localStorage.setItem('theme', systemTheme);
});




