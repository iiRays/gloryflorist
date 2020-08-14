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
                <meta charset="UTF-8"/>
                <title>Glory Florist : Staff Members</title>
                <link rel="stylesheet" href="CSS/staffMembers.css"/>
            </head>
    
            <body>

                <form id='container' method='POST' action="../Controllers/updateStaff.php">

                    <div id='hotbar'>
                        <a href='#' id='glory'>glory florist</a>
                        <a href='#' class='link'>shop</a>
                        <a href='#' class='link'>cart</a>
                        <a href='#' class='link'>account</a>
                        <a href='#' class='link' id='currentLink'>dashboard</a>
                    </div>

                    <div id='top'>
                        <div id='content'>
                            <a href='#' id='back'>back&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;to&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;dashboard</a>
                            <a id='title'>Staff Members</a>
                        </div>
                    </div>

                    <div id='bottom'>
                        <div id='content'>
    
                            <div id='buttons'>
                                <a href='registerStaff.php' class='button'>Add staff member</a>
                                <input type='checkbox' name='seeChanges' id='seeChanges' onclick='see()'/>
                                <label id='seeChangesText' for='seeChanges'>Recent changes</label>
                                    <input class='button' value="Save changes" type="submit"></input>
                            </div>
      
                            <div id='changes'>
                                <xsl:for-each select="//changelog">
                                    <a id='text'>
                                    - Changed <span><xsl:value-of select="account"/></span> to <span><xsl:value-of select="new_status"/></span>.
                                </a>
                                </xsl:for-each>
                                
                            </div>
      
                            <div id='list'>
      
                                <div id='heading'>
                                    <a id='id'>ID</a>
                                    <a id='name'>NAME</a>
                                    <a id='isActive'>IS ACTIVE?</a>
                                </div>
                                
                                <xsl:for-each select="//staff">
                                    <div class='member'>
                                        
                                        <input type="hidden">
                                            <xsl:attribute name="name">staffId_<xsl:value-of select="position()"/></xsl:attribute>  <!-- Staff index -->
                                            <xsl:attribute name="value">
                                                <xsl:value-of select="id"/> <!-- Staff ID -->
                                            </xsl:attribute>
                                    
                                        </input>
                                        
                                        <a class='id'>
                                            <xsl:value-of select="id"/>
                                        </a>
                                        <a class='name'>
                                            <xsl:value-of select="name"/>
                                        </a>
                                        
                                        <input type='checkbox' class='checkbox'>
                                            <!-- Is Active ?-->
                                            <xsl:if test="status='active'">
                                                <xsl:attribute name="checked">
                                                    checked
                                                </xsl:attribute>
                                            </xsl:if>
                                            
                                            
                                            <!-- Dynamic ID and name -->
                                            <xsl:attribute name="name">isActive_<xsl:value-of select="position()"/></xsl:attribute>
                                            <xsl:attribute name="id">isActive_<xsl:value-of select="position()"/></xsl:attribute>
                                        </input>                                                    
                                           
                                        <label class='checkboxLabel'>
                                            <xsl:attribute name="for">isActive_<xsl:value-of select="position()"/></xsl:attribute>
                                            <div class='slider'></div>
                                        </label>
                                    </div>
                                </xsl:for-each>
      
                                
                                <input type="hidden" name="staffCount">
                                    <xsl:attribute name="value">
                                        <xsl:value-of select="count(//staff)"/>
                                    </xsl:attribute>
                                    
                                </input>
                               

                            </div>
      
                        </div>
                    </div>

                </form>

                <script>
                    function see() {
                    var checkbox = document.getElementById("seeChanges");
                    var text = document.getElementById("changes");
  
                    if (checkbox.checked == true){
                    text.style.opacity = "1";
                    text.style.maxHeight = "500px";
                    } else {
                    text.style.opacity = "0";
                    text.style.maxHeight = "0px";
                    }
                    }
                </script>

            </body>

        </html>
    </xsl:template>

</xsl:stylesheet>
