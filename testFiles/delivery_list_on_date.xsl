<?xml version="1.0" encoding="UTF-8"?>

<!--
Author     : kelvin tham yit hang
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                xmlns:date="http://exslt.org/dates-and-times"
                extension-element-prefixes="date"
                xmlns:php="http://php.net/xsl" 
                exclude-result-prefixes="php"

                version="1.1">
    <xsl:output method="xml"/>


    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
           
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Delivery List </title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th colspan="2"> Delivery</th>
                        <th colspan="2"> Pickup</th>
                    </tr>
                    <tr>
                        <th>9AM - 1PM</th>
                        <th>1PM - 6PM</th>
                        <th>9AM - 1PM</th>
                        <th>1PM - 6PM</th>
                    </tr>
                    <tr>
                        <td>
                            <table border="1">
                                <tr> <!--start of table '9AM - 1PM deliveries' -->
                                    <xsl:for-each select="deliveries/Delivery">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="Timeslot = '9AM - 1PM'">                                            
                                                <td>
                                                    <p>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>
                                                        Sender   : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        Recipient: <xsl:value-of select="Recipient"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Address  : <xsl:value-of select="Address"/>
                                                        <br/>
                                                    </p>
                                                </td>                                           
                                            </xsl:if> 
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <!-- -->
                            <table border="1"> <!--start of table '1PM - 6PM deliveries' -->
                                <tr>
                                    <xsl:for-each select="deliveries/Delivery">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="Timeslot = '1PM - 6PM'">                                            
                                                <td>
                                                    <p>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>
                                                        Sender   : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        Recipient: <xsl:value-of select="Recipient"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Address  : <xsl:value-of select="Address"/>
                                                        <br/>
                                                    </p>
                                                </td>                                          
                                            </xsl:if> 
                                        </xsl:if>  
                                    </xsl:for-each>   
                                </tr>            
                            </table><!-- end of table -->     
                        </td>
                        <td>
                            <table  border="1">
                                <tr>
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="Timeslot = '9AM - 1PM'">                                           
                                                <td>
                                                    <p>
                                                        Picker  : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>                                           
                                                    </p>
                                                </td>                                                                           
                                            </xsl:if> 
                                        </xsl:if>      
                                    </xsl:for-each>
                                </tr>
                            </table>                           
                        </td>   
                        <td>
                            <table  border="1">
                                <tr>
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="Timeslot = '1PM - 6PM'">
                                            
                                                <td>
                                                    <p>
                                                        Picker  : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>                                           
                                                    </p>
                                                </td>                                                                            
                                            </xsl:if>
                                        </xsl:if>                                                                     
                                    </xsl:for-each>
                                </tr> 
                            </table>                           
                        </td>    
                    </tr>     
                </table> <!-- end of the whole table -->
            </body>         
        </html>
    </xsl:template>
</xsl:stylesheet>
