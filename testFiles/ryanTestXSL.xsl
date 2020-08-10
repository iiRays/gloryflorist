<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>ryanTestXSL.xsl</title>
            </head>
            <body>
                <h2>Order list</h2>
                <table border="1">
                    <tr bgcolor="#9acd32">
                        <th>Order ID</th>
                        <th>Grand total</th>
                    </tr>
                    <xsl:for-each select="//orders">
                        <tr>
                            <td>
                                <xsl:value-of select="id"/>
                            </td>
                            <td>
                                <xsl:value-of select="grand_total"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
