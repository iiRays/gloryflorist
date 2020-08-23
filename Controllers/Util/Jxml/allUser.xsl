<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>All User List</title>
            </head>
            <body>
                <h1>All User List</h1>
                <table border="1" style="text-align:center;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                    <xsl:for-each select="allUser/User">
                        <tr>
                            <td>
                                <xsl:value-of select="ID"/>
                            </td>
                            <td>
                                <xsl:value-of select="Name"/>
                            </td>
                            <td>
                                <xsl:value-of select="Email"/>
                            </td>
                            <td>
                                <xsl:value-of select="Phone"/>
                            </td>
                            <td>
                                <xsl:value-of select="Address"/>
                            </td>
                            <td>
                                <xsl:value-of select="Role"/>
                            </td>
                            <td>
                                <xsl:value-of select="Status"/>
                            </td>
                        </tr>
                        
                    </xsl:for-each>
                    <p>Total number of user: <xsl:value-of select="count(//User/Name)"/></p>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
