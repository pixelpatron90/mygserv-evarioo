const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    './node_modules/flowbite/**/*.js',
    './storage/framework/views/*.php',
    './app/**/*.php', './resources/views/**/*.blade.php',
    './themes/mygserv-evarioo/**/*.blade.php'],

  theme: {
    // Colors
    extend: {
      colors: {
        primarycolor: '#23262f',
        secondarycolor: '#cb3f44',
        //white: "#636B77",
        accent: '#CFE2FD',
        normal: '#E7F0FE',
        button: '#5270fd',
        darkbutton: '#2f3949',
        darkmodetext: '#cbd5e1',
        darkmode: '#1A202C',
        darkmodehover: '#2D3748',
        darkmode2: '#252D3B',
        logo: '#5270fd',

        secondary: {
          50: 'var(--secondary-50, #ffffff)',
          100: 'var(--secondary-100, #fafcff)',
          200: 'var(--secondary-200, #ebeef3)',
          300: 'var(--secondary-300, #bbbfd2)',
          400: 'var(--secondary-400, #808498)',
          500: 'var(--secondary-500, #606372)',
          600: 'var(--secondary-600, #4d4f60)',
          700: 'var(--secondary-700, #353741)',
          800: 'var(--secondary-800, #1c1c20)',
          900: 'var(--secondary-900, #000000)',
        },
        primary: {
          50: 'var(--primary-50, #EDF0FF)',
          100: 'var(--primary-100, #C6DBFF)',
          200: 'var(--primary-200, #9BBEFB)',
          300: 'var(--primary-300, #799CD8)',
          400: 'var(--primary-400, #5270FD)',
        },
        danger: {
          50: 'var(--danger-50)',
          100: 'var(--danger-100)',
          200: 'var(--danger-200)',
          300: 'var(--danger-300)',
          400: 'var(--danger-400)',
        },
        success: {
          50: 'var(--success-50)',
          100: 'var(--success-100)',
          200: 'var(--success-200)',
          300: 'var(--success-300)',
          400: 'var(--success-400)',
        },
      },
      textShadow: {
        sm: '0 1px 2px #000000',
        DEFAULT: '0 2px 4px #000000',
        lg: '0 8px 16px #000000',
      },
      fontFamily: {
        sans: ['roboto', ...defaultTheme.fontFamily.sans],
        intertight: ['"Inter Tight"', 'sans-serif'],
      },
    },
    container: {
      center: true,
      padding: '25px',
      screens: {
        sm: '800px',
        md: '928px',
        lg: '1184px',
        xl: '1500px',
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [
    plugin(function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          }),
        },
        { values: theme('textShadow') }
      );
    }),
    require('@tailwindcss/typography'),
    require('flowbite/plugin'),
    require('autoprefixer'),
  ],
};
