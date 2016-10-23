

#include<stdio.h>

int main()
{

long int rows,n,d=22,i,a=6,array[105],j,k,space,count,no,x;
clrscr();
printf("enter n");
scanf("%ld",&n);
n++;
rows=n;
for(i=1;i<=(n*(n+1)/2);i++)
{
 array[i]=a;
a=a+d;
d=d+16;
}


  for(i=0,k=1; i<rows; i++)
    {
	for(space=1; space <= rows-i; space++)
	    printf("  ");

	for(j=0; j <= i; j++)
	{
	    if (j==0 || i==0)
	       x=1;
	    else
	    {count=0;
	    no=array[k];
	    while(no!=0)
	    {
	    count++;
	    no=no/10;
	    }
	    if(count==1)
	    {printf("0000");

	    printf("%ld ",array[k]); }
	    else if(count==2)
	     {printf("000");
	    printf("%ld ",array[k]); }
	    else if(count==3)
	     {printf("00");
	    printf("%ld ",array[k]);  }
	    else if(count==4)
	   {  printf("0");
	    printf("%ld ",array[k]);  }
	    else if(count==5)
	  {  printf("%ld ",array[k]); }

	     //printf("%5d",array[k]);


	    k++;
	    }
	}
	printf("\n");
	    }





return 0;
}