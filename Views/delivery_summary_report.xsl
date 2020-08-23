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
                <title>Delivery Summary Record </title>
            </head>
            <body>
                <h2>Delivery</h2>
                <table border="1">
                    <tr>
                        <th>Date</th>
                        <th>Timeslot</th>
                        <th>Address</th>
                        <th>Asset type</th>
                        <th>City/town</th>
                        <th>Postcode</th>
                        <th>Sender</th>
                        <th>Sendercontact</th>
                        <th>Recipient</th>
                        <th>Recipientcontact</th>    
                    </tr>
                    <xsl:for-each select="deliveries/Delivery">
                        <xsl:variable name="start" select="php:function('getStartDate')"/>
                        <xsl:variable name="end" select="php:function('getEndDate')"/>
                        <xsl:variable name="startDate" select="10000 * substring($start, 1, 4) + 100 * substring($start, 6, 2) + substring($start, 9, 2)"/>
                        <xsl:variable name="endDate" select="10000 * substring($end, 1, 4) + 100 * substring($end, 6, 2) + substring($end, 9, 2)"/>
                        <xsl:variable name="date" select="10000 * substring(Date, 1, 4) + 100 * substring(Date, 6, 2) + substring(Date, 9, 2)"/>
                        
                        <xsl:if test="$date >= $startDate and $endDate >= $date">
                            <tr>
                                <td>
                                    <xsl:value-of select="Date"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Timeslot"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Address"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Asset_type"/>
                                </td>
                                <td>
                                    <xsl:value-of select="City/town"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Postcode"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Sender"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Sendercontact"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Recipient"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Recipientcontact"/>
                                </td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each> 
                </table> <!-- end of the whole table -->
                <!-- Applying xpath -->
                <p>
                    Total record: <xsl:value-of select="count(//Delivery[number(translate(Date, '-','')) >= number(translate(php:function('getStartDate'), '-','')) and number(translate(php:function('getEndDate'), '-','')) >= number(translate(Date, '-',''))]/@Id)"></xsl:value-of>
                </p>
                <p>
                    Total delivery Fee: <xsl:value-of select="sum(//Delivery[number(translate(Date, '-','')) >= number(translate(php:function('getStartDate'), '-',''))and number(translate(php:function('getEndDate'), '-','')) >= number(translate(Date, '-',''))]/DeliveryFee)"></xsl:value-of>
                </p>
              
                <br/>
                <br/>
                <h2>Self Pickup</h2>
                <table border="1">
                    <tr>
                        <th>Date</th>
                        <th>Sender</th>
                        <th>Contact</th>
                        <th>Timeslot</th>
                    </tr>
                    <xsl:for-each select="deliveries/SelfPickUp">
                        <xsl:variable name="start" select="php:function('getStartDate')"/>
                        <xsl:variable name="end" select="php:function('getEndDate')"/>
                        <xsl:variable name="startDate" select="10000 * substring($start, 1, 4) + 100 * substring($start, 6, 2) + substring($start, 9, 2)"/>
                        <xsl:variable name="endDate" select="10000 * substring($end, 1, 4) + 100 * substring($end, 6, 2) + substring($end, 9, 2)"/>
                        <xsl:variable name="date" select="10000 * substring(Date, 1, 4) + 100 * substring(Date, 6, 2) + substring(Date, 9, 2)"/>
                        
                        <xsl:if test="$date >= $startDate and $endDate >= $date">
                            <tr>
                                <td>
                                    <xsl:value-of select="Date"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Sender"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Sendercontact"/>
                                </td>
                                <td>
                                    <xsl:value-of select="Timeslot"/>
                                </td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each> 
                </table> <!-- end of the whole table -->
                <!-- Applying xpath -->
                <p>
                    Total record: <xsl:value-of select="count(//SelfPickUp[number(translate(Date, '-','')) >= number(translate(php:function('getStartDate'), '-','')) and number(translate(php:function('getEndDate'), '-','')) >= number(translate(Date, '-',''))]/@Id)"></xsl:value-of>
                </p>
            </body>         
        </html>
    </xsl:template>
</xsl:stylesheet>
