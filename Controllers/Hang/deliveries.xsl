<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : delivery.xsl
    Created on : August 17, 2020, 9:30 AM
    Author     : kelvin tham yit hang
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
                <title>Delivery List</title>
            </head>
            <body>
                <h2>Delivery List</h2>
                <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Carbs Per Serving</th>
                        <th>Totol Carbs Per Day</th>
                        <!--<th>Fiber Per Serving</th>
                        <th>Fat Per serving</th>
                        <th>kj Per Serving</th>-->
                    </tr>
                    <xsl:for-each select="foodList/foodItem" position="">
                        <!--<xsl:if test="position() >=3  and position() &lt;=5">-->
                        <!--<xsl:if test="@type = 'fruit' or @type = 'vegetable'">-->
                        <xsl:if test="@type != 'fruit'">
                        <tr>
                            <td>
                                <xsl:value-of select="position()"/>
                            </td>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="carbsPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="carbsPerServing * 3"/>
                            </td>
                            <!--<td>
                                <xsl:value-of select="fiberPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="fatPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="kjPerServing"/>
                            </td>-->
                        </tr>
                        </xsl:if>
                    </xsl:for-each>
                            
                </table>
                        
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
