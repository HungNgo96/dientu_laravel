<!DOCTYPE html>
<title>Example</title>
<style>
  body {
    background-image: url('/pix/samples/bg1.gif');
  }

  main {
    margin-bottom: 200%;
  }

  .floating-menu {
    font-family: sans-serif;
    background: yellowgreen;
    padding: 5px;;
    width: 130px;
    z-index: 100;
    position: fixed;
    bottom: 0px;
    right: 0px;
  }

  .floating-menu a, 
  .floating-menu h3 {
    font-size: 0.9em;
    display: block;
    margin: 0 0.5em;
    color: white;
  }
</style>
<main>
  <p>Scroll down and watch the menu remain fixed in the same position, as though it was floating.</p>
  <nav class="floating-menu">
    <h3>Floating Menu</h3>
    <a href="/css/">CSS</a>
    <a href="/html/">HTML</a>
    <a href="/coldfusion/">ColdFusion</a>
    <a href="/database/">Database</a>
  </nav>
</main>