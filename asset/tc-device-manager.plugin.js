grapesjs.plugins.add('tc-device-manager', (editor, options) => {
  /*
  * Here you should rely on GrapesJS APIs, so check 'API Reference' for more info
  * For example, you could do something like this to add some new command:
  *
  * editor.Commands.add(...);
  */

  const commands = editor.Commands;
  const config = editor.getConfig().deviceManager;
  const pn = editor.Panels;
  const panelDevices = pn.addPanel({id: 'devices-c'});
  const buttons = panelDevices.get('buttons');

  commands.add('deviceChange', (editor, sender, data) => {
    console.log(editor, sender, data);
    editor.setDevice(data.name);
  });

  buttons.models.map(btn => btn.id).forEach(btnId => {
    pn.removeButton(panelDevices.id, btnId);
  });

  const selectOptions = config.devices.map(device => {
    return `<option ${device.name === config.defaultDevice ? 'selected' : ''} value="${device.name}">${device.name}</option>`
  });
  const gjsDevices = document.createElement('div');
  gjsDevices.className = 'gjs-devices-c';
  gjsDevices.innerHTML = `
    <div class="gjs-device-label">Device</div>
      <div class="gjs-field gjs-select">
        <span id="gjs-input-holder">
          <select class="gjs-devices">
              ${selectOptions}
          </select>
        </span>
          <div class="gjs-sel-arrow">
              <div class="gjs-d-s-arrow"></div>
          </div>
      </div>
  `;
  const select = gjsDevices.querySelector('select');
  select.onchange = (ev) => {
    commands.run('deviceChange', config.devices.find(device => device.name === ev.target.value));
  };

  editor.on('load', () => {
    panelDevices.view.$el[0].appendChild(gjsDevices);
    editor.setDevice(config.defaultDevice);
  });

  editor.getDeviceObject = () => {
    return config.devices.find(device => device.name === editor.getDevice());
  }
});
