(function () {
  const items = window.newNavData || [];

  // ─── DESKTOP MEGAMENU (hover) ───
  const megaMap = {};
  items.forEach(item => {
    if (item.groups && item.groups.length) {
      megaMap[item.key] = { li: item.liId, mega: item.megaId };
    }
  });

  let closeTimer = null;
  let activeMega = null;

  function openMega(key) {
    if (window.innerWidth <= 768) return;
    clearTimeout(closeTimer);
    if (activeMega === key) return;
    if (activeMega) _closeMega(activeMega);
    activeMega = key;

    const m      = megaMap[key];
    const liEl   = document.getElementById(m.li);
    const megaEl = document.getElementById(m.mega);

    megaEl.style.cssText = 'visibility:hidden;display:block;opacity:0;pointer-events:none;';
    const megaW  = megaEl.offsetWidth;
    const liRect = liEl.getBoundingClientRect();
    const winW   = window.innerWidth;
    const MARGIN = 12;

    const overflowsRight = liRect.left + megaW > winW - MARGIN;
    megaEl.style.cssText = '';
    megaEl.classList.toggle('align-right', overflowsRight);

    liEl.classList.add('active');
    megaEl.classList.add('open');
  }

  function scheduledClose(key) {
    closeTimer = setTimeout(() => {
      if (activeMega === key) _closeMega(key);
    }, 120);
  }

  function _closeMega(key) {
    const m = megaMap[key];
    document.getElementById(m.li).classList.remove('active');
    const el = document.getElementById(m.mega);
    el.classList.remove('open');
    el.classList.remove('align-right');
    if (activeMega === key) activeMega = null;
  }

  function closeAllMega() {
    clearTimeout(closeTimer);
    Object.keys(megaMap).forEach(_closeMega);
  }

  Object.entries(megaMap).forEach(([key, m]) => {
    const liEl   = document.getElementById(m.li);
    const megaEl = document.getElementById(m.mega);
    if (!liEl || !megaEl) return;
    liEl.addEventListener('mouseenter',   () => openMega(key));
    liEl.addEventListener('mouseleave',   () => scheduledClose(key));
    megaEl.addEventListener('mouseenter', () => { clearTimeout(closeTimer); });
    megaEl.addEventListener('mouseleave', () => scheduledClose(key));
  });

  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAllMega(); });

  // ─── MOBILE DRAWER ───
  const hamburger = document.getElementById('hamburger');
  const drawer    = document.getElementById('mobileDrawer');
  const track     = document.getElementById('drawerTrack');
  const subPanel  = document.getElementById('drawerSubPanel');
  let drawerOpen  = false;

  // Build subMenus lookup from PHP-injected data
  const subMenus = {};
  items.forEach(item => {
    subMenus[item.key] = { title: item.label, groups: item.groups };
  });

  hamburger.addEventListener('click', () => {
    drawerOpen = !drawerOpen;
    hamburger.classList.toggle('open', drawerOpen);
    drawer.classList.toggle('ready', drawerOpen);
    document.body.style.overflow = drawerOpen ? 'hidden' : '';
    if (drawerOpen) track.className = 'drawer-track level-1';
  });

  window.openSub = function (key) {
    const data = subMenus[key];
    if (!data) return;

    let html = `
      <div class="drawer-sub">
        <button class="drawer-back" onclick="closeSub()">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M10 4L6 8l4 4"/></svg>
          Volver
        </button>
        <div class="drawer-sub-title">${data.title}</div>`;

    data.groups.forEach(group => {
      if (group.label) {
        html += `<div class="drawer-group-label">${group.label}</div>`;
      }
      group.items.forEach(item => {
        html += `
          <a href="${item.url}" class="drawer-sub-item">
            ${item.label}
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 4l4 4-4 4"/></svg>
          </a>`;
      });
    });

    html += '</div>';
    subPanel.innerHTML = html;
    track.className = 'drawer-track level-2';
  };

  window.closeSub = function () {
    track.className = 'drawer-track level-1';
  };
}());
