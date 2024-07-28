import { app, BrowserWindow, nativeImage } from "electron";
import { spawn } from "child_process";

let phpServer;

function createWindow() {
  const icon = nativeImage.createFromPath(`${app.getAppPath()}/public/images/icone.jpg`);

  if (app.dock) {
    app.dock.setIcon(icon);
  }

  const win = new BrowserWindow({
    icon,
    width: 1200,
    height: 900,
    webPreferences: {
      nodeIntegration: true
    },
    autoHideMenuBar: true
  });

  const port = 7908

  phpServer = spawn("php", ["artisan", "serve", `--port=${port}`]);

  phpServer.stdout.on("data", (data) => {
    console.log(`PHP: ${data}`);
  });

  phpServer.stderr.on("data", (data) => {
    console.error(`PHP error: ${data}`);
  });

  phpServer.on("close", (code) => {
    console.log(`Servidor PHP finalizado com código ${code}`);
  });

  const url = `http://127.0.0.1:${port}/`;

  const checkServer = () => {
    fetch(url)
      .then((res) => {
        if (res.ok) {
          win.loadURL(url);
        } else {
          setTimeout(checkServer, 1000);
        }
      })
      .catch(() => {
        setTimeout(checkServer, 1000);
      });
  };

  checkServer();

  win.loadURL(url);

  win.on('closed', () => {
    if (phpServer) {
      phpServer.kill();
      phpServer = null; 
    }
  });
}

app.whenReady().then(createWindow);

app.on("window-all-closed", () => {
  if (process.platform !== "darwin") {
    app.quit();
  }
});

app.on("activate", () => {
  if (BrowserWindow.getAllWindows().length === 0) {
    createWindow();
  }
});

app.on("before-quit", () => {
  if (phpServer) {
    phpServer.kill();
    phpServer = null;
  }
});

app.on("quit", () => {
  if (phpServer) {
    phpServer.kill();
    phpServer = null;
  }
});