<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Multi Page Layout Email</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif;">

<!-- Page 1 -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" background="https://picsum.photos/800/1100?random=1" style="color:white; background-size:cover;">
  <tr>
    <td align="center">
      <h1 style="margin:0;">Welcome Page</h1>
      <p>This is the first page with background image.</p>
      <img src="https://picsum.photos/400/200" width="400" style="display:block; border-radius:8px;">
    </td>
  </tr>
</table>

<!-- Page 2 -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#fad0c4">
  <tr>
    <td>
      <h2 style="margin:0;">Table Layout Page</h2>
      <p>This page contains a table with data.</p>
      <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <tr style="background:#555; color:#fff;">
          <th>Sl No</th><th>Name</th><th>City</th>
        </tr>
        <tr><td>1</td><td>Alice</td><td>London</td></tr>
        <tr><td>2</td><td>Bob</td><td>Paris</td></tr>
        <tr><td>3</td><td>Charlie</td><td>Berlin</td></tr>
      </table>
    </td>
  </tr>
</table>

<!-- Page 3 -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" background="https://picsum.photos/800/1100?random=2" style="color:white;">
  <tr>
    <td>
      <h2 style="margin:0;">Image Showcase</h2>
      <table border="0" cellpadding="10" cellspacing="0" align="center">
        <tr>
          <td><img src="https://picsum.photos/150/100?random=11" width="150"></td>
          <td><img src="https://picsum.photos/150/100?random=12" width="150"></td>
        </tr>
        <tr>
          <td><img src="https://picsum.photos/150/100?random=13" width="150"></td>
          <td><img src="https://picsum.photos/150/100?random=14" width="150"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<!-- Page 4 -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#f0f8ff">
  <tr>
    <td>
      <h2 style="margin:0;">Content Page</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Duis vehicula augue ut facilisis vestibulum.
      </p>
      <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <tr><th>Feature</th><th>Description</th></tr>
        <tr><td>Fast</td><td>Quick rendering performance</td></tr>
        <tr><td>Responsive</td><td>Works across devices</td></tr>
        <tr><td>Customizable</td><td>Supports multiple layouts</td></tr>
      </table>
    </td>
  </tr>
</table>

<!-- Page 5 -->
<table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#185a9d" style="color:white;">
  <tr>
    <td align="center">
      <h1 style="margin:0;">Thank You</h1>
      <p>This is the final page with gradient-like background.</p>
      <img src="https://picsum.photos/500/200?random=5" width="500" style="display:block; border-radius:8px;">
    </td>
  </tr>
</table>

</body>
</html>
