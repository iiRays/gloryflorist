<?xml version="1.0" encoding="UTF-8"?>

<!--
Author     : kelvin tham yit hang
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>


    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Delivery Summary Report</title>
            </head>
            <body>
                <h1>Delivery Summary Report</h1>
                <h3>Prepared By:  Date: </h3>
                <table border="1">
                        <tr>
                            <th>No.</th>
                            <th>CardMessage</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>DateTime</th>
                            <th>Remark</th>
                            <th>DeliveryFee (RM)</th>
                        </tr>
                        <xsl:for-each select="deliveries/Delivery" position="">
                            <!--<xsl:if test="position() >=3  and position() &lt;=5">-->
                            <!--<xsl:if test="@type = 'fruit' or @type = 'vegetable'">-->
                            <!-- <xsl:if test="@type != 'fruit'">-->
                            <tr>
                                <td>
                                    <xsl:value-of select="position()"/>
                                </td>
                                <td>
                                    <xsl:value-of select="CardMessage"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Name"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Contact"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Datetime"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Remark"/>
                                </td>
                                <td>
                                    <xsl:value-of select="DeliveryFee"/>
                                </td>
                            </tr>
                            <!-- </xsl:if>-->
                            <!-- some calculation here -->
                            <p>Total delivry fee: RM <xsl:value-of select="sum(//Delivery/DeliveryFee)"/></p>
                            <p>Total number of delivery: <xsl:value-of select="count(//Delivery/Name)"/></p>
                        </xsl:for-each>               
                </table>                
            </body>         
        </html>
    </xsl:template>
</xsl:stylesheet>
