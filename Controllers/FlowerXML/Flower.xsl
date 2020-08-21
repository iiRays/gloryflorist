<?xml version="1.0" encoding="UTF-8"?>
<!--
 Author: Chong Wei Jie
 ID: 19WMR09574
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Flower List</title>
            </head>
            <body>
                <h2>Flower List</h2>
                <table border="1" style="text-align:center;">
                    <tr>
                        <th>ID.</th>
                        <th>Image</th>
                        <th>Flower name</th>
                        <th>Remarks</th>
                        <th>Available for floral arrangement</th>
                    </tr>
                    <xsl:for-each select="flowers/flower">
                        <tr>
                            <td>
                                <xsl:value-of select="id"/>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center; width: 180px; height: 180px;">
                                    <img>
                                        <xsl:attribute name="src">
                                            <xsl:value-of select="image_url" />
                                        </xsl:attribute>
                                    
                                        <xsl:attribute name="style">
                                            max-width:180px;max-height: 180px;display: block;
                                        </xsl:attribute>
                                   
                                    </img>
                                </div>
                            </td>
                            <td>
                                <xsl:value-of select="flower_name"/>
                            </td>
                            <td>
                                <xsl:value-of select="remark"/>
                            </td>
                            <td>
                                <xsl:if test="is_available='true'">
                                    Yes
                                </xsl:if>
                                <xsl:if test="is_available='false'">
                                    No
                                </xsl:if>
                            </td>
                            
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>