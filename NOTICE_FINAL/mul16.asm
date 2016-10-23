.model small
.data 
a dw 1234h
b dw 0100h
c dw 0000h
d dw 0000h

 
.code 
start:
mov ax,@data
mov ds,ax
mov ax,a
mov bx,b
mul bx
mov word ptr c,ax
mov word ptr d,dx
mov ah,4ch
int 21h
end start
