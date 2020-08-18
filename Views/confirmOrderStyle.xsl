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
                <title>Glory Florist : Confirm Order</title>
                <link rel="stylesheet" href="CSS/confirmOrder.css"/>
            </head>
    
            <body>

            <form id='container'>

                <div id='hotbar'>
                  <a href='home.php' id='glory'>glory florist</a>
                  <a href='#' class='link'>shop</a>
                  <a href='cart.php' class='link' id='currentLink'>cart</a>
                  <a href='#' class='link'>account</a>
                </div>

                <div id='top'>
                  <div id='text'>
                    <a href='cart.php' id='back'>back&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;to your&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;cart</a>
                    <a id='title'>Confirm Order</a>
                  </div>
                </div>

                <div id='content'>

                  <div id='left'>

                    <a class='heading'>Receipt</a>

                    <?php

                      $quantities = explode(",", filter_input(INPUT_POST, "quantities"));

                      // change to get from db

                    ?>

                    <div id='receipt'>
                        
                        
                        <xsl:for-each select="//items">
                            <div class='item'>
                                <a class='amount'><xsl:value-of select="quantity"/></a>
                                <a class='name' href='#'><xsl:value-of select="arrangement"/></a>
                                <a class='price'>$30.00</a>
                            </div>
                        </xsl:for-each>
                        
                      <!--<a class='amount'><?php echo $quantities[0];?></a> -->  
                      
                      <!--<div class='item'>
                        
                        <a class='amount'>1</a>
                        <a class='name' href='#'>White rose</a>
                        <a class='price'>$10.00</a>
                      </div>

                      <div class='item'>
                        <a class='amount'>3</a>
                        <a class='name' href='#'>White flower</a>
                        <a class='price'>$30.00</a>
                      </div>

                      <div class='item'>
                        <a class='amount'>2</a>
                        <a class='name' href='#'>White thing</a>
                        <a class='price'>$20.00</a>
                      </div>-->
                    </div>

                    <a id='total'>Total: <span>$150.00</span></a>

                  </div>

                  <div id='right'>

                    <a class='heading'>Payment details</a>
                    
                    <a href='create_order.php' id='order_button'>COMPLETE ORDER</a>

                  </div>

                </div>

              </form>

            </body>

        </html>
    </xsl:template>

</xsl:stylesheet>
