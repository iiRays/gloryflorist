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
                <title>Pickup List </title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>9AM</th>
                        <th>10AM</th>
                        <th>11AM</th>
                        <th>12AM</th>
                        <th>1PM</th>
                        <th>2PM</th>
                        <th>3PM</th>
                        <th>4PM</th>
                        <th>5PM</th>
                        <th>6PM</th>
                    </tr>
                    <tr>
                        <td>
                            <table border="1"><!-- 0900 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 0900 and 1000 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1000 and 1100 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1100 and 1200 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1200 and 1300 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1300 and 1400 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1400 and 1500 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1500 and 1600 > number(translate(Timeslot,':', ''))  ">
                                                <tr>
                                                    <td>
                                                        <p>
                                                            Picker  : <xsl:value-of select="Sender"/>
                                                            <br/>
                                                            contact  : <xsl:value-of select="Contact"/>
                                                            <br/>
                                                            Date     : <xsl:value-of select="Date"/>
                                                            <br/>                        
                                                            Time     : <xsl:value-of select="Timeslot"/>
                                                            <br/>      
                                                        </p>
                                                    </td>
                                                </tr>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>   
                        <td>
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1600 and 1700 > number(translate(Timeslot,':', ''))  ">
                                                <td>
                                                    <p>
                                                        Picker  : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>                        
                                                        Time     : <xsl:value-of select="Timeslot"/>
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
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1700 and 1800 > number(translate(Timeslot,':', ''))  ">
                                                <td>
                                                    <p>
                                                        Picker  : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>                        
                                                        Time     : <xsl:value-of select="Timeslot"/>
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
                            <table border="1"><!-- 1500 deliveries -->
                                <tr> 
                                    <xsl:for-each select="deliveries/SelfPickUp">
                                        <xsl:if test="Date = php:function('getSpecifiedDate')">
                                            <xsl:if test="number(translate(Timeslot,':', '')) >= 1800 and 1900 > number(translate(Timeslot,':', ''))  ">
                                                <td>
                                                    <p>
                                                        Picker  : <xsl:value-of select="Sender"/>
                                                        <br/>
                                                        contact  : <xsl:value-of select="Contact"/>
                                                        <br/>
                                                        Date     : <xsl:value-of select="Date"/>
                                                        <br/>                        
                                                        Time     : <xsl:value-of select="Timeslot"/>
                                                        <br/>      
                                                    </p>
                                                </td>
                                            </xsl:if>                                           
                                        </xsl:if>   
                                    </xsl:for-each> 
                                </tr>                                        
                            </table><!-- end of table -->
                        </td>  
                    </tr>     
                </table> <!-- end of the whole table -->
            </body>         
        </html>
    </xsl:template>
</xsl:stylesheet>
