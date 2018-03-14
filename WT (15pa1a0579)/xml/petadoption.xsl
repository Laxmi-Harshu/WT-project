<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Petadoption</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>pettype</th>
      <th>gender</th>
      <th>age</th>
      <th>description</th>
      <th>Contactinfo</th>
      <tr>
       <th>name</th>
       <th>address</th>
       <th>phn</th>
       <th>email</th>
      </tr>
    </tr>
    <xsl:for-each select="petadoptions/homepets">
    <tr>
      <td><xsl:value-of select="pettype"/></td>
      <td><xsl:value-of select="gender"/></td>
      <td><xsl:value-of select="age"/></td>
       <td><xsl:value-of select="description"/></td>
       <td><xsl:value-of select="Contactinfo"/></td>
        </tr>
        <xsl:for-each select="petadoptions/Contactinfo">
        <tr>
        <td><xsl:value-of select="name"/></td>
       <td><xsl:value-of select="address"/></td>
       <td><xsl:value-of select="phn"/></td>
       <td><xsl:value-of select="email"/></td>
       </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>
