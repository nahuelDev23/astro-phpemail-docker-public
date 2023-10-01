import { defineConfig } from 'astro/config';

import react from "@astrojs/react";

// https://astro.build/config
export default defineConfig({
  integrations: [react()],
  static: {
    // Copiar archivos desde la carpeta src/server/ al directorio de salida.
    source: 'src/server',
    target: 'dist'
  }
});