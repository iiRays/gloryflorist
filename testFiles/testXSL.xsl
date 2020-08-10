<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : testXSL.xsl
    Created on : August 9, 2020, 4:41 PM
    Author     : mast3
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>testXSL.xsl</title>
            </head>
            <body>
                <h2>My Flower Collection</h2>
                <table border="1">
                    <tr bgcolor="#9acd32">
                        <th>Flower Name</th>
                        <th>Description</th>
                    </tr>
                    <xsl:for-each select="//flower">
                        <tr>
                            <td>
                                <xsl:value-of select="flower_name"/>
                            </td>
                            <td>
                                <xsl:value-of select="description"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
