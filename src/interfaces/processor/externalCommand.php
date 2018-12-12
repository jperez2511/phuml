<?php

abstract class plExternalCommandProcessor extends plProcessor 
{

    abstract public function execute( $infile, $outfile, $type );

    public function process( $input, $type ) 
    {
        $tmpDir = 'C:\Users\userName\Desktop';

        // Create temporary datafiles
        $infile  = tempnam( $tmpDir, 'phuml' );
        $outfile = tempnam( $tmpDir, 'phuml' );
        
        file_put_contents( $infile, $input );

        unlink( $outfile );

        $this->execute( $infile, $outfile, $type );
        
        $outdata = file_get_contents( $outfile );

        unlink( $infile );
        unlink( $outfile );

        return $outdata;
    }
}

?>
