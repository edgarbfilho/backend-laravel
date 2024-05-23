// vite.config.js
import laravel from 'laravel-vite-plugin';

export default {
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  esbuild: {
    // Adiciona manualmente o loader para arquivos .js
    loaders: {
      '.js': 'jsx'
    }
  }
};
