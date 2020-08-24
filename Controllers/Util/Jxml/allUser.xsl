<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="../../../Views/CSS/staffMembers.css"/>
                <style>
                    body{
                    font-family: "Cute Font";
                    }
                    
                    table{
                    border: 1px solid transparent; 
                    border-collapse: collapse;
                    font-size: 30px;
                    }
                    table td, th{
                    padding: 10px;
                    
                    border-right: 2px solid transparent;
                    background-color: white;
                    }
                    
                    table td{
                    border-top: 2px solid #d28983;
                    }
                    
                    table th{
                    background-color: rgba(243, 181, 177, 0.25);
                    color: white;
                    border-bottom: 10px solid transparent;
                    }
                    .userCount{
                    color: white;
                    font-size: 30px;
                    margin: 0;
                    }
                </style>
                <title>All User List</title>
            </head>
            <body>
                <div id="container">
                    <div id='top'>
                        <div id='content'>
                            <a href='../../../Views/staffDashboard.php' id='back'>back to dashboard</a>
                            <a id='title'>View All Users</a>
                            </div>
                    </div>
                    <div id='bottom'>
                        <div id='content'>
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
                                <p class="userCount">Total number of user: <xsl:value-of select="count(//User/Name)"/></p>
                            </table>
                        </div>
                    </div>
                    </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
